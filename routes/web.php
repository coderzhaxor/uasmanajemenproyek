<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [Controller::class,'index'])->name('Home');
// Route::get('/shop', [Controller::class,'shop'])->name('Shop');
// Route::get('/transaksi', [Controller::class,'transaksi'])->name('Transaksi');
// Route::get('/checkout', [Controller::class,'checkout'])->name('checkout');

// Route::get('/admin', [Controller::class,'login'])->name('login');
// Route::POST('/admin/loginProsess', [Controller::class,'Loginproses'])->name('Loginproses');
// Route::get('/admin/logout', [Controller::class,'logout'])->name('logout');
// Route::get('/admin/dashboard', [Controller::class,'admin'])->name('Admin');
// Route::get('/admin/product', [ProductController::class,'index'])->name('Product');
// Route::get('/admin/report', [Controller::class,'report'])->name('Report');


// Route::POST('/admin/addData', [ProductController::class,'store'])->name('addData');
// Route::get('/admin/editModal/{id}', [ProductController::class,'show'])->name('editModal');
// Route::PUT('/admin/updateData/{id}', [ProductController::class,'update'])->name('updateData');
// Route::DELETE('/admin/deleteData/{id}', [ProductController::class,'destroy'])->name('deleteData');

// Route::POST('/admin/addUser', [ProductController::class,'store'])->name('addUser');
// Route::get('/admin/edituser/{id}', [ProductController::class,'show'])->name('editUser');
// Route::PUT('/admin/updateUser/{id}', [ProductController::class,'update'])->name('updateUser');
// Route::DELETE('/admin/deleteUser/{id}', [ProductController::class,'destroy'])->name('deleteUser');


// // Route::group(['middleware' => 'admin'], function () {
//     Route::get('/admin/dashboard', [Controller::class, 'admin'])->name('admin');
//     Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
//     Route::get('/admin/logout', [Controller::class, 'logout'])->name('logout');
//     Route::get('/admin/report', [Controller::class, 'report'])->name('report');
//     Route::get('/admin/addModel', [ProductController::class,'addModal'])->name('addModal');



///////////
// Public routes
Route::get('/', [TransaksiController::class, 'index'])->name('home');
Route::get('/shop', [Controller::class, 'shop'])->name('shop');
Route::get('/transaksi', [Controller::class, 'transaksi'])->name('transaksi');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::get('/checkOut', [Controller::class, 'keranjang'])->name('keranjang');
Route::get('/checkOut/{id}', [Controller::class, 'bayar'])->name('keranjang.bayar');

// User login & registration
Route::post('/user/store', [UserController::class, 'registerPelanggan'])->name('register.pelanggan');
Route::post('/login_pelanggan', [UserController::class, 'loginProses'])->name('loginproses.pelanggan');
Route::post('/logout_pelanggan', [UserController::class, 'logout'])->name('logout.pelanggan');

// Cart and checkout routes
Route::post('/addTocart', [TransaksiController::class, 'addTocart'])->name('addTocart');
Route::get('/checkout', [Controller::class, 'checkout'])->name('checkout');
Route::post('/checkout/proses/{id}', [Controller::class, 'prosesCheckout'])->name('checkout.product');
Route::post('/checkout/prosesPembayaran', [Controller::class, 'prosesPembayaran'])->name('checkout.bayar');

// Admin login route (GET & POST)
Route::get('/admin', [Controller::class, 'login'])->name('admin.login'); // Show admin login page
Route::post('/admin/loginProses', [Controller::class, 'loginProses'])->name('admin.loginProses'); // Handle admin login
Route::get('/admin/register', [Controller::class, 'showRegisterForm'])->name('register');
Route::post('/admin/register', [Controller::class, 'registerAdmin'])->name('admin.register');

// Routes for authenticated admins
Route::group(['middleware' => 'admin'], function () {

    // Admin dashboard and logout
    Route::get('/admin/dashboard', [Controller::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/logout', [Controller::class, 'logout'])->name('admin.logout');

    // Product management
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/admin/addData', [ProductController::class, 'store'])->name('admin.addProduct');
    Route::get('/admin/editModal/{id}', [ProductController::class, 'show'])->name('admin.editProduct');
    Route::put('/admin/updateData/{id}', [ProductController::class, 'update'])->name('admin.updateProduct');
    Route::delete('/admin/deleteData/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');

    // Transaction management
    Route::get('/admin/transaksi', [TransaksiAdminController::class, 'index'])->name('admin.transaksi');

    // User management
    Route::get('/admin/user_management', [UserController::class, 'index'])->name('admin.userManagement');
    Route::get('/admin/user_management/addModalUser', [UserController::class, 'addModalUser'])->name('admin.addModalUser');
    Route::post('/admin/user_management/addData', [UserController::class, 'store'])->name('admin.addDataUser');
    Route::get('/admin/user_management/editUser/{id}', [UserController::class, 'show'])->name('admin.editUser');
    Route::put('/admin/user_management/updateDataUser/{id}', [UserController::class, 'update'])->name('admin.updateUser');
    Route::delete('/admin/user_management/deleteUser/{id}', [UserController::class, 'destroy'])->name('admin.deleteUser');

    // Report generation
    Route::get('/admin/report', [Controller::class, 'report'])->name('admin.report');
});
