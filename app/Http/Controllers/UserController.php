<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return view('admin.page.user', [
            'name'  => "User Management",
            'title' => 'Admin User Management',
            'data'  => $data,
        ]);
    }

    public function addModalUser()
    {
        return view('admin.modal.modalUser', [
            'title' => 'Tambah Data User',
            'nik'   => date('Ymd') . rand(000, 999),
        ]);
    }

    public function store(UserRequest $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string',
            'telp' => 'required|string',
            'tgl_lahir' => 'required|date',
            'role' => 'required|integer',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alamat = $request->alamat;
        $user->telp = $request->telp;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->role = $request->role;
        $user->is_admin = $request->role === 1 ? 1 : 0; // Set is_admin based on role
        $user->is_member = 1; // Default to member
        $user->is_active = 1; // Default to active

        $user->save();

        Alert::toast('Registration successful!', 'success');
        return redirect()->route('userManagement');
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('admin.modal.editUser', [
            'title' => 'Edit Data User',
            'data'  => $data,
        ])->render();
    }

    public function update(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        $data->username     = $request->username;
        $data->email        = $request->email;

        // Update password only if provided
        if ($request->filled('password')) {
            $data->password = Hash::make($request->password);
        }

        $data->alamat   = $request->alamat;
        $data->telp     = $request->telp;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->role     = $request->role;

        $data->save();
        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->route('userManagement');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => "Data berhasil dihapus"
        ]);
    }

    public function storePelanggan(UserRequest $request)
    {
        $data = new User;
        $data->nik          = "Member" . rand(000, 999);
        $data->username     = $request->username;
        $data->email        = $request->email;
        $data->password     = Hash::make($request->password);
        $data->alamat       = $request->alamat . " " . $request->alamat2;
        $data->telp         = $request->telp;
        $data->role         = 0; // Member role
        $data->tgl_lahir    = $request->date;
        $data->is_active    = 1;
        $data->is_member    = 1;
        $data->is_admin     = 0;

        // Set default photo if none is provided
        $data->foto = $request->hasFile('foto') ? $this->uploadPhoto($request) : 'default.png';

        $data->save();
        Alert::toast('Data berhasil disimpan', 'success');
        return redirect()->route('home');
    }

    private function uploadPhoto($request)
    {
        $photo = $request->file('foto');
        $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
        $photo->move(public_path('storage/user'), $filename);
        return $filename;
    }

    public function loginProses(Request $request)
    {
        $dataLogin = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and is active
        if ($user && $user->is_active === 0) {
            Alert::toast('Kamu belum terdaftar', 'error');
            return back();
        }

        // Attempt to log in
        if (Auth::attempt($dataLogin)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            Alert::toast('Kamu berhasil login', 'success');

            // Check if user is admin or member
            if ($user->is_admin) {
                return redirect()->intended('/admin/dashboard'); // Redirect to admin dashboard
            } else {
                return redirect()->intended('userManagement'); // Redirect to user dashboard
            }
        } else {
            Alert::toast('Email dan Password salah', 'error');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::toast('Kamu berhasil logout', 'success');
        return redirect('/');
    }
}
