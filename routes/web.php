<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\layouts\HomeController;
use App\Http\Controllers\layouts\CartController;
use App\Http\Controllers\layouts\CustomerController;

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

// frontend
Route::group(['prefix' => ''], function(){
    Route::get('/', [HomeController::class, 'home'])->name('layouts.home');
    Route::get('/product/{product}',[HomeController::class, 'detail'])->name('layouts.detail');
    Route::get('/shop/{categoryId?}', [HomeController::class, 'home'])->name('shop');

    Route::get('/login', [CustomerController::class, 'login'])->name('login');
    Route::post('/login', [CustomerController::class, 'postLogin']);
    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
    Route::get('/register', [CustomerController::class, 'register'])->name('layouts.register');
    Route::post('/register', [CustomerController::class, 'postRegister']);

});

//backend
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'postLogin']);
// Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
// Route::post('/admin/register', [AdminController::class, 'postRegister']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/logout',[AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/usermanager', [UserController::class, 'index'])->name('admin.user');
    Route::get('/usermanager/register', [UserController::class, 'register'])->name('admin.register');
    Route::post('/usermanager/register', [UserController::class, 'postRegister']);
    // Route::get('/info', [UserController::class, 'info'])->name('admin.info');

    Route::get('/usermanager/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/usermanager/update/{user}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/usermanager/delete/{user}', [UserController::class, 'destroy'])->name('admin.user.delete');

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

    Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/order-detail/{id}', [OrderController::class, 'orderDetail'])->name('admin.orderDetail');
});

Route::group(['prefix' => 'cart'], function(){
    Route::get('/', [CartController::class, 'view'])->name('cart.view');
    Route::get('/add/{product}', [CartController::class, 'addToCart'])->name('add.cart');
    Route::get('/delete/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
    // Route::get('/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');


});

Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


Route::get('/admin/order/export-html/{id}', [OrderController::class, 'exportHtml'])->name('admin.order.export.html');

Route::get('/admin/revenue/export-html', [OrderController::class, 'exportRevenueHtml'])->name('admin.revenue.export.html');
Route::get('/admin/revenue/month-export-html', [OrderController::class, 'exportRevenueHtmlMonth'])->name('admin.revenue.exportmonth.html');

Route::get('/admin/products/export-excel-html', [ProductController::class, 'exportExcelHtml'])->name('admin.products.export.excel.html');



