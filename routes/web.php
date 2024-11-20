<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartOrderController;

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

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/order/{id}', [HomeController::class, 'order'])->name('order');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('acc');

    Route::post('/contact', [HomeController::class, 'post_contact']);
    Route::post('/login', [HomeController::class, 'check_login']);
    Route::post('/register', [HomeController::class, 'post_register']);
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', [CartController::class, 'view'])->name('cart.view');
    Route::get('/add/{product}/{quantity?}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/update/{product}/{quantity?}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('/checkout', [CartOrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/checkout', [CartOrderController::class, 'post_checkout']);
    Route::get('/order-list', [CartOrderController::class, 'orderList'])->name('order.orderList');
    Route::get('/detail/{order}', [CartOrderController::class, 'checkout'])->name('order.detail');
    Route::get('/verify/{token}', [CartOrderController::class, 'verify'])->name('order.verify');
});

Route::get('/admin/login', [DashboardController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [DashboardController::class, 'check_login']);
Route::get('/admin/register', [DashboardController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [DashboardController::class, 'check_register']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');
        Route::group(['prefix' => 'account'], function() {

            Route::get('/', [AccountController::class, 'index'])->name('admin.account.index');
            Route::post('/', [AccountController::class, 'store'])->name('admin.account.store');

            Route::get('/create', [AccountController::class, 'create'])->name('admin.account.addAccount');

            Route::get('/{account}', [AccountController::class, 'show'])->name('admin.account.show');

            Route::get('/{account}/edit', [AccountController::class, 'edit'])->name('admin.account.editAccount');

            Route::put('/{account}', [AccountController::class, 'update'])->name('admin.account.update');

            Route::delete('/{account}', [AccountController::class, 'destroy'])->name('admin.account.destroy');
    
        });
        Route::group(['prefix' => 'category'], function() {

            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');

            Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.addCategory');

            Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');

            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.editCategory');

            Route::put('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');

            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    
        });
        Route::group(['prefix' => 'product'], function() {

            Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
            Route::post('/', [ProductController::class, 'store'])->name('admin.product.store');

            Route::get('/create', [ProductController::class, 'create'])->name('admin.product.addProduct');

            Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');

            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('admin.product.editProduct');

            Route::put('/{product}', [ProductController::class, 'update'])->name('admin.product.update');

            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    
        });
    
});