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

//Home Page
Route::get('/', 'IndexController@getIndex')->name('index');
Route::post('/search-product', 'IndexController@postSearch');
Route::post('/search-product-detail', 'IndexController@postSearchDetail');
//Product Homepage
Route::get('/san-pham/{category}', 'IndexController@getProduct')->name('san-pham');
//Blog Page
Route::get('/tin-tuc', 'BlogController@getIndex')->name('tin-tuc');
Route::get('/tin-tuc/{slug}', 'BlogController@showBlog')->name('tin-tuc.chitiet');
//Cart Home Page
Route::get('/gio-hang', 'CartController@getIndex')->name('gio-hang');
Route::post('/add-to-cart', 'CartController@postAddCart');
Route::post('/delete-cart', 'CartController@postDelete');
Route::post('/update-cart', 'CartController@postUpdate');
//Lien He Home Page
Route::get('/lienhe', 'LienHeController@getIndex')->name('lienhe');


//Cart
Route::get('cart','Home\CartController@getAddCart')->name('home.cart.add');
Route::post('cart','Home\CartController@postAddCart');
Route::post('remove-cart','Home\CartController@postRemoveCart')->name('home.cart.remove-add');
Route::post('remove-all-cart','Home\CartController@postClearCart')->name('home.cart.clear-add');

//Auth
Auth::routes();

//Admin
Route::prefix('admin')->group(function () {
	Route::get('login', 'AdminLoginController@Index')->name('admin.login');
	Route::get('reset-password', 'AdminLoginController@getReset')->name('admin.reset');
	Route::get('/', 'DashboardControler@Index')->name('admin');	

	//Banner
	Route::get('banner','BannerController@Index')->name('admin.banner');
	Route::get('banner/add','BannerController@getAdd')->name('admin.banner.add');
	Route::post('banner/add','BannerController@postAdd');
	Route::get('banner/edit/{id}', 'BannerController@getEdit')->name('admin.banner.edit');
	Route::post('banner/edit/{id}', 'BannerController@postEdit')->name('admin.banner.postedit');
	Route::get('banner/list','BannerController@getList')->name('admin.banner.list');
	Route::post('banner/delete', 'BannerController@postDelete')->name('admin.banner.delete');

	//News
	Route::get('news','NewsController@Index')->name('admin.news');
	Route::get('news/list', 'NewsController@getList')->name('admin.news.list');
	Route::get('news/add', 'NewsController@getAdd')->name('admin.news.add');
	Route::post('news/add', 'NewsController@postAdd');
	Route::get('news/edit/{id}', 'NewsController@getEdit')->name('admin.news.edit');
	Route::post('news/edit/{id}', 'NewsController@postEdit');
	Route::post('news/delete', 'NewsController@postDelete')->name('admin.news.delete');

	//Product
	Route::get('product', 'ProductController@Index')->name('admin.product');
	Route::get('product/list', 'ProductController@getList')->name('admin.product.list');
	Route::get('product/add', 'ProductController@getAdd')->name('admin.product.add');
	Route::post('product/add', 'ProductController@postAdd')->name('admin.product.postadd');
	Route::get('product/edit/{id}', 'ProductController@getEdit')->name('admin.product.edit');
	Route::post('product/edit/{id}', 'ProductController@postEdit')->name('admin.product.postedit');
	Route::post('product/delete', 'ProductController@postDelete')->name('admin.product.delete');

	//Category
	Route::get('category', 'CategoryController@Index')->name('admin.category');
	Route::get('category/add', 'CategoryController@getAdd')->name('admin.category.add');
	Route::post('category/add', 'CategoryController@postAdd');
	Route::get('category/edit/{id}', 'CategoryController@getEdit')->name('admin.category.edit');
	Route::post('category/edit/{id}', 'CategoryController@postEdit')->name('admin.category.postedit');
	Route::get('category/list', 'CategoryController@getList')->name('admin.category.list');
	Route::post('category/delete', 'CategoryController@postDelete')->name('admin.category.delete');

	//Oder
	Route::get('order','OrderController@Index')->name('admin.order');

	//User
	Route::get('users', 'AccountController@Index')->name('admin.users');
	Route::get('users/list', 'AccountController@getList')->name('admin.users.list');
	Route::get('users/list-all', 'AccountController@getListAll')->name('admin.users.list-all');
	Route::post('users', 'AccountController@postUpdate');
	Route::get('users/add', 'AccountController@getAdd')->name('admin.users.add');
	Route::post('users/add', 'AccountController@postAdd');
	Route::post('users/delete', 'AccountController@postDelete')->name('admin.users.delete');

	//Contact
	Route::get('contact', 'ContactController@Index')->name('admin.contact');
	Route::post('contact', 'ContactController@postUpdate')->name('admin.update');

	//CSKH
	Route::get('cskh', 'CskhController@Index')->name('admin.cskh');
	Route::get('cskh/add', 'CskhController@getAdd')->name('admin.cskh.add');
	Route::post('cskh/add', 'CskhController@postAdd');
	Route::get('cskh/edit/{id}', 'CskhController@getEdit')->name('admin.cskh.edit');
	Route::post('cskh/edit/{id}', 'CskhController@postEdit');
	Route::get('cskh/list', 'CskhController@getList')->name('admin.cskh.list');
	Route::post('cskh/delete', 'CskhController@postDelete')->name('admin.cskh.delete');

});

//refresh token in laravel
Route::post('/refresh-token', function () {
	return response()->json(array(
                                    'response'=>'true'
                                ,   'data'=>csrf_token()
    )); 
});

// Route::get('/home', 'HomeController@index')->name('home');
