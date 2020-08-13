<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// quản trị danh mục sản phẩm
Route::group(['prefix' => 'category'], function(){
    Route::get('/show', 'CategoryController@index');
    Route::post('/add', 'CategoryController@create');
    Route::get('/edit/{id}', 'CategoryController@edit');
    Route::post('/update/{id}', 'CategoryController@update');
    Route::delete('/delete/{id}', 'CategoryController@destroy');
});

// quản trị sản phẩm
Route::group(['prefix' => 'products'], function(){
    Route::get('/show', 'ProductsController@index');
    Route::post('/add', 'ProductsController@create');
    Route::get('/product-detail/{id}','ProductsController@show');
    Route::get('/product-involve','ProductsController@Products_Involve');
    Route::get('/edit/{id}', 'ProductsController@edit');
    Route::post('/update/{id}', 'ProductsController@update');
    Route::delete('/delete/{id}', 'ProductsController@destroy');
});

// quản trị danh mục tin tức
Route::group(['prefix' => 'catenews'], function(){
    Route::get('/show', 'CateNewsController@index');
    Route::post('/add', 'CateNewsController@create');
    Route::get('/edit/{id}', 'CateNewsController@edit');
    Route::post('/update/{id}', 'CateNewsController@update');
    Route::delete('/delete/{id}', 'CateNewsController@destroy');
});

// quản trị tin tức
Route::group(['prefix' => 'news'], function(){
    Route::get('/show', 'NewsController@index');
    Route::post('/add', 'NewsController@create');
    Route::get('/news-detail/{id}','NewsController@show');
    Route::get('/edit/{id}', 'NewsController@edit');
    Route::post('/update/{id}', 'NewsController@update');
    Route::delete('/delete/{id}', 'NewsController@destroy');
});

// quản trị liên hệ
Route::group(['prefix' => 'contact'], function(){
    Route::get('/show', 'ContactController@index');
    Route::post('/add', 'ContactController@create');
    Route::delete('/delete/{id}', 'ContactController@destroy');
});

// Client
Route::group(['prefix' => 'client'], function(){
    Route::get('/productsnew', 'BaseController@ProductsNew');
    Route::get('/productshighlight', 'BaseController@ProductsHighlight');
    Route::get('/shop', 'BaseController@Shop');
    Route::get('/detail_product/{id}', 'BaseController@Detail_Product');
    Route::get('/list_product_cate/{id}', 'BaseController@List_ProductCate');
    Route::get('/list_news_cate/{id}', 'BaseController@List_NewsCate');
    // Carts
    
});