<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['web']], function() {
	Route::get('/{author?}',['as' => 'index', 'uses' => 'QuoteController@getIndex']);
	Route::post('new',['as' => 'create', 'uses' => 'QuoteController@postQuote']);
	Route::get('/delete/{quote_id}', ['as' => 'delete', 'uses' => 'QuoteController@getDeleteQuote']);
	Route::get('/admin/login',['as' => 'admin.login', 'uses' => 'Admincontroller@getLogin']);
	Route::post('/admin/login',['as' => 'admin.login', 'uses' => 'Admincontroller@postLogin']);
	Route::group(['middleware'=> 'auth'],function() {
		Route::get('/admin/dashboard',['as' => 'admin.dashboard', 'uses' => 'Admincontroller@getDashboard', 'middleware' => 'auth']);
		Route::get('/admin/logout',['as' => 'admin.logout', 'uses' => 'Admincontroller@getLogout']);
		Route::get('/admin/quotes',function () {
			 return view('admin.quotes');
		});
	});
});
