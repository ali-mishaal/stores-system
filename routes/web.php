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

Route::get('/', function () {
    return view('index');
});

//route for client
Route::prefix('client')->group(function(){
    
    Route::get('/' , 'clientController@index')->name('index.client');
	Route::get('/create' , 'clientController@create')->name('create.client');
	Route::post('/create' , 'clientController@store')->name('store.client');
	Route::get('/edit/{id}' , 'clientController@edit')->name('edit.client');
	Route::post('/edit/{id}' , 'clientController@update')->name('update.client');
	Route::get('/delete/{id}' , 'clientController@destroy')->name('destroy.client');

});

//route for store
Route::prefix('store')->group(function(){
    
    Route::get('/' , 'storesController@index')->name('index.sotre');
	Route::get('/create' , 'storesController@create')->name('create.sotre');
	Route::post('/create' , 'storesController@store')->name('store.sotre');
	Route::get('/edit/{id}' , 'storesController@edit')->name('edit.sotre');
	Route::post('/edit/{id}' , 'storesController@update')->name('update.sotre');
	Route::get('/delete/{id}' , 'storesController@destroy')->name('destroy.sotre');

}); 

//route for item
Route::prefix('item')->group(function(){
    
    Route::get('/' , 'itemController@index')->name('index.item');
	Route::get('/create' , 'itemController@create')->name('create.item');
	Route::get('/edit/{id}' , 'itemController@edit')->name('edit.item');
	Route::get('/update' , 'itemController@update')->name('update.item');
	Route::get('/delete/{id}' , 'itemController@destroy')->name('destroy.item');
	Route::get('/store' , 'itemController@store')->name('store.item');

});

//route for bill head
Route::prefix('billhead')->group(function(){
    
    Route::get('/' , 'BillHeadController@index')->name('index.head');
	Route::get('/create' , 'BillHeadController@create')->name('create.head');
	Route::get('/edit/{id}' , 'BillHeadController@edit')->name('edit.head');
	Route::get('/update' , 'BillHeadController@update')->name('update.head');
	Route::get('/delete/{id}' , 'BillHeadController@destroy')->name('destroy.head');
	Route::get('/store' , 'BillHeadController@store')->name('store.head');
	Route::get('/item' , 'BillHeadController@getitem');
	Route::get('/price' , 'BillHeadController@getprice');
	Route::get('/priceedit' , 'BillHeadController@getpriceedit');

});


//route for bill reports
Route::prefix('report')->group(function(){
    
    Route::get('/' , 'reportController@index')->name('index.report');


});

//route for bill print
Route::prefix('print')->group(function(){
    
    Route::get('/{id}' , 'printController@index')->name('index.print');
    Route::get('/' , 'printController@upload')->name('upload.report');
    Route::post('/' , 'printController@uploaded')->name('uploaded.re');

   

});


Route::get('pri/show','printController@show')->name('show.re');
Route::get('pri/create','printController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
