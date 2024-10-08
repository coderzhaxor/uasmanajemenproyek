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
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\product;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $products = Product::all(); // Mengambil semua produk
        return view('pelanggan.page.home', [
            'products' => $products,
            'title' => 'shop', // 'title' lebih tepat dari 'tittle'
        ]);
    }


    public function shop(){
        return view('pelanggan.page.shop',[
            'tittle' =>  'shop',
        ]);
    }

    public function transaksi(){
        return view('pelanggan.page.transaksi',[
            'tittle' =>  'transaksi',
        ]);
    }

    public function checkout(){
        return view('pelanggan.page.checkout',[
            'tittle' =>  'Checkout',
        ]);
    }

    public function admin(){
        return view('admin.page.dashboard',[
            'name' => "Dashboard",
            'tittle' =>  'Admin Dashboard',
        ]);
    }

    
   
    
    public function report(){
        return view('admin.page.report',[
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
    public function loginProses(Request $request)
    {
        Session::flash('error', $request->email);
        $dataLogin = [
            'email' => $request->email,
            'password'  => $request->password,
        ];

        $user = new User;
        $proses = $user::where('email', $request->email)->first();

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
