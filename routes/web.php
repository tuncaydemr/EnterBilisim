<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AltMenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriesController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'home')->name('home');
    Route::get('/shops', 'shops')->name('shops');
    Route::get('/favories', 'favories')->name('favories');
    Route::get('/security', 'security')->name('security');
    Route::get('/bank-numbers', 'bankNumber')->name('bankNumber');
    Route::get('/admin', 'admin');
});

Route::controller(AltMenuController::class)->group(function () {
    Route::get('/categories/{menu}/{altmenu}', 'altmenu')->name('altmenu');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/login', 'admin')->name('admin');
    Route::get('/admin/home', 'adminHome')->name('adminHome');
    Route::get('/admin/users', 'adminUsers')->name('adminUsers');
    Route::get('/admin/products', 'adminProducts')->name('adminProducts');
    Route::get('/admin/orders', 'adminOrders')->name('adminOrders');
    Route::get('/admin/orders/view/{id}', 'orderView')->name('orderView');
    Route::get('/admin/orders/edit/{id}', 'orderEdit')->name('orderEdit');
    Route::get('/admin/settings', 'adminSettings')->name('adminSettings');
    Route::get('/admin/user/{id}', 'userDelete')->name('userDelete');
    Route::get('/admin/product/{id}', 'productDelete')->name('productDelete');
    Route::get('/admin/order/{id}', 'orderDelete')->name('orderDelete');
    Route::get('/admin/product-add', 'adminAddProduct')->name('adminAddProduct');
    Route::get('/admin/menu-add', 'adminMenu')->name('adminMenu');
    Route::get('/admin/alt-menu-add', 'adminAltMenu')->name('adminAltMenu');
    Route::get('/admin/menu-delete', 'adminMenuDelete')->name('adminMenuDelete');
    Route::get('/admin/alt-menu-delete', 'adminAltMenuDelete')->name('adminAltMenuDelete');
    Route::get('/admin/menuDelete/{id}', 'menuDelete')->name('menuDelete');
    Route::get('/admin/altMenuDelete/{id}', 'altMenuDelete')->name('altMenuDelete');
    Route::post('/admin/altMenuAdd', 'altMenuAdd')->name('altMenuAdd');

    Route::post('/admin/menuAdd', 'menuAdd')->name('menuAdd');
    Route::post('/admin/productAdd', 'productAdd')->name('productAdd');
    Route::post('/admin/settingAdd', 'settingAdd')->name('settingAdd');
});

Route::controller(MenuController::class)->group(function () {
    Route::get('/categories/{menu}', 'menu')->name('menu');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/accountChange/{id}', 'accountChange')->name('accountChange');
    Route::get('/accountChange2/{id}', 'accountChange2')->name('accountChange2');
    Route::get('/accountChange3/{id}', 'accountChange3')->name('accountChange3');
    Route::get('/account', 'account')->name('account');
    Route::get('/my-account/{id}', 'myAccount')->name('my.account');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}', 'product')->name('product');
});

Route::controller(BasketController::class)->group(function () {
    Route::get('/basket', 'basket')->name('basket');
    Route::get('/basket/address', 'address')->name('address');
    Route::get('/basket/payment', 'payment')->name('payment');
    Route::delete('/basket/{id}', 'deleteBasket')->name('deleteBasket');

    Route::post('/basket/add', 'basketAdd')->name('basketAdd');
    Route::post('/adetUp/{id}', 'adetUp')->name('adetUp');
    Route::post('/adetDown/{id}', 'adetDown')->name('adetDown');
    Route::post('/basket/payment1', 'payment1')->name('payment1');
    Route::post('/basket/payment2', 'payment2')->name('payment2');
});

Route::controller(FavoriesController::class)->group(function () {
    Route::get('/favoriesAdd/{id}', 'favoriesAdd')->name('favoriesAdd');
    Route::delete('/favoriesDelete/{id}', 'favoriesDelete')->name('favoriesDelete');
});
