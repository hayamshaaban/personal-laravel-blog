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

Route::get('/','publicController@index')->name('index');
Route::get('/post/{post}/','publicController@singlePost')->name('singlePost');
Route::get('about','publicController@about')->name('about');
Route::get('contact','publicController@contact')->name('contact');
Route::post('contact','publicController@contactPost')->name('contactPost');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user in dashboard
Route::prefix('user')->group(function(){
    Route::post('new-comment','userController@newComment')->name('newComment');
    Route::get('dashboard','userController@dashboard')->name('userDashboard');
    Route::get('comments','userController@comments')->name('userComments');
    Route::post('comments/{id}/delete','userController@deletecomment')->name('deleteComment');
    Route::get('profile','userController@profile')->name('userProfile');
    Route::post('profile','userController@profilePost')->name('userProfilePost');



});
//author in dashboard
Route::prefix('author')->group(function(){
    Route::get('dashboard','authorController@dashboard')->name('authorDashboard');
    Route::get('posts','authorController@posts')->name('authorPosts');
    Route::get('posts/new','authorController@newPost')->name('newPost');
    Route::post('posts/create','authorController@createPost')->name('createPost');
    Route::get('posts/{id}/edit','authorController@editPost')->name('editPost');
    Route::post('posts/{id}/update','authorController@updatePost')->name('updatePost');
    Route::post('posts/{id}/delete','authorController@deletePost')->name('deletePost');
    Route::get('comments','authorController@comments')->name('authorComments');
});

//admin in dashboard
Route::prefix('admin')->group(function(){
    Route::get('dashboard','adminController@dashboard')->name('adminDashboard');
    Route::get('posts','adminController@posts')->name('adminPosts');
    Route::get('comments','adminController@comments')->name('adminComments');
    Route::post('comments/{id}/delete','adminController@deleteComment')->name('adminDeleteComment');
    Route::get('users','adminController@users')->name('adminUsers');
    Route::get('posts/{id}/edit','adminController@editPost')->name('adminEditPost');
    Route::post('posts/{id}/update','adminController@updatePost')->name('adminUpdatePost');
    Route::post('posts/{id}/delete','adminController@deletePost')->name('adminDeletePost');
    Route::get('users','adminController@users')->name('adminUsers');
    Route::get('users/{id}/edit','adminController@editUser')->name('adminEditUser');
    Route::post('users/{id}/edit','adminController@updateUser')->name('adminUpdateUser');
    Route::post('users/{id}/delete','adminController@deleteUser')->name('adminDeleteUser');
    //products
    Route::get('products','adminController@products')->name('adminProducts');
    Route::get('products/new','adminController@newProducts')->name('adminNewProducts');
    Route::post('products/store','adminController@storeProducts')->name('adminStoreProducts');

    Route::get('products/{id}','adminController@editProduct')->name('adminEditProduct');
    Route::post('products/{id}','adminController@updateProduct')->name('adminUpdateProduct');
    Route::post('products/{id}/delete','adminController@deleteProduct')->name('adminDeleteProduct');



});

//shop 
Route::prefix('shop')->group(function(){
    Route::get('/','ShopController@index')->name('shop.index');
    Route::get('product/{id}','ShopController@singleProduct')->name('shop.singleProduct');
    Route::get('product/{id}/order','ShopController@orderProduct')->name('shop.orderProduct');

   
});
