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
Route::get('/danh-muc/{slug}', 'HomeController@getProductsByCategory')->name('home.category');

// Tin tức
Route::get('/bai-viet', 'HomeController@getListArticles')->name('home.article');

// Chi tiet tin tuc
Route::get('/bai-viet/{id}', 'HomeController@getArticle')->name('home.article.detail');

// Tìm kiếm sản phẩm
Route::get('/tim-kiem', 'HomeController@search')->name('home.search');

// Trang liên hệ
Route::get('/lien-he', 'HomeController@contact')->name('home.contact');
Route::post('/lien-he', 'HomeController@postContact')->name('home.postContact');

// Gio hang
Route::get('/gio-hang', 'CartController@index')->name('home.cart');

// Thêm sản phẩm vào giỏ hàng
Route::get('/gio-hang/them-vao-gio/{id}', 'CartController@addToCart')->name('home.cart.add-to-cart');

// Xóa sản phẩm khỏi giỏ hàng
Route::get('/gio-hang/xoa-sp-khoi-gio-hang/{rowId}', 'CartController@removeProduct')->name('home.cart.remove-product');

// Cập nhật số lượng sản phẩm
Route::get('/gio-hang/cap-nhat-so-luong', 'CartController@updateProduct')->name('home.cart.update-product');

// Hủy đơn hàng
Route::get('/gio-hang/huy-dat-hang', 'CartController@destroy')->name('home.cart.destroy');

// Đặt hàng
Route::get('/dat-hang', 'CartController@order')->name('home.cart.order');

Route::post('/dat-hang', 'CartController@postOrder')->name('home.cart.postOrder');

Route::get('/dat-hang/hoan-tat-dat-hang', 'CartController@completedOrder')->name('home.cart.completedOrder');

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
    route::resource('orderStatus', 'OrderStatusController');

});


