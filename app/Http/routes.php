<?php
// Shop
	Route::get('/', function () {
		return redirect('/home');
	});
	Route::get('/home', ['as'=>'home', 'uses'=>'PagesController@getHomePage']);
	Route::post('/home', ['as'=>'search', 'uses'=>'SearchController@postSearch']);
	Route::get('/my-account', ['as'=>'getmyaccount', 'uses'=>'AccountController@getMyAccount']);
	Route::post('/my-account', ['as'=>'postmyaccount', 'uses'=>'AccountController@postMyAccount']);
	Route::get('/category/{id}/{slug}', ['as'=>'category', 'uses'=>'PagesController@category']);
	Route::get('/category/{id}/{slug}/nameAsc', ['as'=>'sort', 'uses'=>'SortController@getSortNameAsc']);
	Route::get('/category/{id}/{slug}/nameDesc', ['as'=>'sort', 'uses'=>'SortController@getSortNameDesc']);
	Route::get('/category/{id}/{slug}/priceAsc', ['as'=>'sort', 'uses'=>'SortController@getSortPriceAsc']);
	Route::get('/category/{id}/{slug}/priceDesc', ['as'=>'sort', 'uses'=>'SortController@getSortPriceDesc']);
	Route::get('/category/{id}/{slug}/newest', ['as'=>'sort', 'uses'=>'SortController@getSortNewest']);
	Route::get('/product-detail/{id}/{slug}', 'PagesController@getProductDetail');
	Route::get('/add2cart/{id}/{tensanpham}', ['as' => 'add2cart', 'uses' => 'PagesController@add2cartfast']);
	Route::post('/add2cart/{id}/{tensanpham}', ['as' => 'add2cart', 'uses' => 'PagesController@add2cart']);
	Route::get('/shopping-cart', ['as' => 'viewcart', 'uses' => 'PagesController@viewcart']);
	Route::get('/del-product-cart/{id}', ['as' => 'del-product-cart', 'uses' => 'PagesController@del_product_cart']);
	Route::get('/del-product-cart-2/{id}', ['as' => 'del-product-cart-2', 'uses' => 'PagesController@del_product_cart_2']);
	Route::get('/del-cart', ['as' => 'del-cart', 'uses' => 'PagesController@del_cart']);
	Route::get('/update_cart/{id}/{qty}/{size}', ['as' => 'update_cart', 'uses' => 'PagesController@update_cart']);
	Route::get('/checkout', ['as' => 'checkout', 'uses' => 'OrdersController@getCheckout']);
	Route::post('/checkout', ['as' => 'postCheckout', 'uses' => 'OrdersController@postCheckout']);

// Auth
Route::group(['prefix' => 'auth'], function(){
	get('/register', 'Auth\AuthController@getRegister');
	post('/register', 'Auth\AuthController@postRegister');
	get('/login', 'Auth\AuthController@getLogin');
	post('/login', 'Auth\AuthController@postLogin');
	get('/logout', 'Auth\AuthController@getLogout');
});

Route::get('/email/active/{code}', 'Auth\AuthController@confirm');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	get('/', function () {
  		return view('admin.index');
	});
	// Admin/Users
	Route::group(['prefix' => 'users'], function(){
		get('/list', 'UsersController@getList');
		get('/add', 'UsersController@getAdd');
		post('/add', 'UsersController@postAdd');
		get('/{id}/edit', 'UsersController@getEdit');
		post('/{id}/edit', 'UsersController@postEdit');
		get('/{id}/del', 'UsersController@del');
		get('/{id}/setRole/{role_id}', 'UsersController@setRole');
		get('/{id}/setActive/{key_active}', 'UsersController@setActive');
	});
	// Admin/Categories
	Route::group(['prefix' => 'categories'], function(){
		get('/list', 'CategoriesController@getList');
		get('/add', 'CategoriesController@getAdd');
		post('/add', 'CategoriesController@postAdd');
		get('/{id}/edit', 'CategoriesController@getEdit');
		post('/{id}/edit', 'CategoriesController@postEdit');
		get('/{id}/del', 'CategoriesController@del');
		get('/{id}/addSubCate', 'CategoriesController@getAddSubCate');
		post('/{id}/addSubCate', 'CategoriesController@postAddSubCate');
	});
	// Admin/Products
	Route::group(['prefix' => 'products'], function(){
		get('/list', 'ProductsController@getList');
		get('/add', 'ProductsController@getAdd');
		post('/add', 'ProductsController@postAdd');
		get('/{id}/edit', 'ProductsController@getEdit');
		post('/{id}/edit', 'ProductsController@postEdit');
		get('/{id}/del', 'ProductsController@del');
		get('/{id}/setAvailability/{availability}', 'ProductsController@setAvailability');
		get('/delimg/{id}', 'ProductsController@getDelImg');
	});
	// Admin/Orders
	Route::group(['prefix' => 'orders'], function(){
		get('/list', 'OrdersController@getList');
		get('/{id}/setStatus/{status}', 'OrdersController@setStatus');
		get('{id}/detail', 'OrdersController@getDetail');
	});
});