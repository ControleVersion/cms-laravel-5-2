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

Route::get('/', [
    'uses' => 'BlogController@index',
]);
//mostrar post
//acrescentado recurso de regex para impedir passagem de parametro diferente de numero no ID
Route::get('/show/{id?}/{texto?}',['uses'=>'BlogController@show' ])->where(['id' => '[0-9]+']);

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/sucesso', function(){
	
	return view('sucesso');
});

Route::get('/category/{id?}', [
	'uses' 	=> 'BlogController@category',
	'as'	=> 'category' 
]);
