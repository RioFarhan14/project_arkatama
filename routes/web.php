<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetpasswordController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\productController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');
//auth
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/forgetpassword', [ForgetpasswordController::class, 'index'])->name('forgetpassword');
Route::put('/forgetpassword',[ForgetpasswordController::class,'forget'])->name('forget');

Route::middleware('auth')->group(function() {
    //logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //Dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::post('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/info/{id}',[DashboardController::class, 'info'])->name('dashboard.info');
    Route::get('/dashboard/order/{id}',[DashboardController::class, 'order'])->name('dashboard.order');
    Route::put('/dashboard/{id}',[DashboardController::class, 'confirm'])->name('dashboard.confirm');
    Route::get('/history',[DashboardController::class,'history'])->name('history.admin');
    //cart
    Route::post('/dashboard',[CartController::class,'addToCart'])->name('addtocart');
    //checkout
    Route::get('dashboard/checkout/', [CheckoutController::class, 'index'])->name('checkout');
    Route::delete('dashboard/checkout/{id}',[CartController::class,'destroy'])->name('checkout.delete');
    Route::post('dashboard/status/{total}',[CheckoutController::class,'checkout'])->name('checkout.confirm');
    Route::get('dashboard/status/{orderId}',[CheckoutController::class, 'status'])->name('status');
    Route::get('/history/user',[CheckoutController::class,'history'])->name('history.user');
    //akses admin & staff
    Route::middleware('role:Admin|Staff')->group(function() {
    //Product CRUD
    Route::get('/Product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    //category CRUD
    Route::get('/Category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::middleware('role:Admin')->group(function() {
    //Role CRUD
    Route::get('/Role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
    //User CRUD
    Route::get('/User', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    //Slider CRUD
    route::get('/slider',[SliderController::class,'index'])->name('slider.index');
    route::get('/slider/create',[SliderController::class,'create'])->name('slider.create');
    route::post('/slider',[SliderController::class,'store'])->name('slider.store');
    route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
    route::put('/slider/{id}',[SliderController::class,'update'])->name('slider.update');
    route::delete('/slider/{id}',[SliderController::class,'destroy'])->name('slider.destroy');
    });
});



