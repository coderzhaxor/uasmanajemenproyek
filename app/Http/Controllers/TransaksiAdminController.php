<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;

class TransaksiAdminController extends Controller
{
    
    public function index()
    {
        $data = transaksi::paginate(10);
        return view('admin.page.transaksi');
    }

}
