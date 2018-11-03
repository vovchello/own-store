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


use Illuminate\Support\Facades\Auth;


Route::namespace('Front')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('cart', 'CartController')->middleware('emptyCart');
    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
    Route::get("product/{product}", 'ProductController@show')->name('front.get.product');
    Route::get('plan','PlanController@index')->name('plan');
    Route::post('plan/{id}','PlanController@register')->name('registerPlan');
    Route::resource('comment', 'CommentController');

});
Auth::routes();

Route::namespace('Auth')->group(function (){
    Route::get("logout", 'LogoutController@index');

});
//Auth::routs();routs

