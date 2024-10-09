<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\product;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $products = Product::paginate(5); // Mengambil semua produk
        return view('pelanggan.page.home', [
            'products' => $products,
            'tittle' => 'shop', // 'title' lebih tepat dari 'tittle'
        ]);
    }


    public function shop()
    {
        $products = Product::paginate(10); // Mengambil semua produk
        return view('pelanggan.page.shop', [
            'products' => $products,
            'tittle' => 'shop', // 'title' lebih tepat dari 'tittle'
        ]);
    }

    public function transaksi()
    {
        return view('pelanggan.page.transaksi', [
            'tittle' =>  'transaksi',
        ]);
    }

    public function checkout()
    {
        return view('pelanggan.page.checkout', [
            'tittle' =>  'Checkout',
        ]);
    }

    public function admin()
    {
        return view('admin.page.dashboard', [
            'name' => "Dashboard",
            'tittle' =>  'Admin Dashboard',
        ]);
    }




    public function report()
    {
        return view('admin.page.report', [
            'name' => "Report",
            'tittle' =>  'Admin Dashboard',
        ]);
    }

    public function login()
    {
        return view('admin.page.login', [
            'name'      => "Login",
            'title'     => 'Admin Login',
        ]);
    }

    public function showRegisterForm()
    {
        return view('admin.page.register');
    }

    public function registerAdmin(UserRequest $request)
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
        $user->is_admin = 1;
        $user->is_member = 0;
        $user->is_active = 1; // Default to active

        $user->save();

        Alert::toast('Registration successful!', 'success');
        return redirect()->route('admin.login');
    }

    public function loginProses(Request $request)
    {
        Session::flash('error', $request->username);
        $dataLogin = [
            'username' => $request->username,
            'password'  => $request->password,
        ];

        $user = new User;
        $proses = $user::where('username', $request->username)->first();

        if ($proses->is_admin === 0) {
            Session::flash('error', 'Kamu bukan admin');
            return back();
        } else {
            if (Auth::attempt($dataLogin)) {
                Alert::toast('Kamu berhasil login', 'success');
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            } else {
                Alert::toast('Email dan Password salah', 'error');
                return back();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::toast('Kamu berhasil Logout', 'success');
        return redirect('admin');
    }
}
