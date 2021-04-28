<?php

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

route::get('/', 'HomeController@index');

//Chi tiết sản phẩm
Route::get('/chi-tiet/{slug}', 'HomeController@detailProduct')->name('home.detailProduct');

// Sản phẩm theo danh mục
Route::get('/danh-muc', 'HomeController@getProductsByCategory')->name('home.category');

// Tin tức
Route::get('/tin-tuc', 'HomeController@getListArticles')->name('home.article');
// Chi tiet tin tuc
Route::get('/tin-tuc/{id}', 'HomeController@getArticle')->name('home.article.detail');

// Tìm kiếm sản phẩm
Route::get('/tim-kiem', 'HomeController@search')->name('home.search');

// Trang liên hệ
Route::get('/lien-he', 'HomeController@contact')->name('home.contact');
Route::post('/lien-he', 'HomeController@postContact')->name('home.postContact');

// Gio hang
Route::get('/dat-hang', 'CartController@index')->name('home.cart');

// Đăng nhập, đăng xuất.
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

// Quản trị
Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => 'checklogin'],function (){

    Route::resource('banner', 'BannerController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('vendor', 'VendorController');
    Route::resource('category', 'CategoryController');
    Route::resource('brand', 'BrandController');
    Route::resource('article', 'ArticleController');
    Route::resource('setting', 'SettingController');
    Route::resource('user', 'UserController');
    Route::resource('contact', 'ContactController');
    // Ql Đơn hàng
    Route::resource('order', 'OrderController');
    Route::post('order/remove-to-cart', 'OrderController@removeToCart')->name('order.remove');

});


