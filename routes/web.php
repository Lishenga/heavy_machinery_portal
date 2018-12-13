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

Route::get('/', [ 'as' => 'login', 'uses' => 'ViewController@index']);
Route::get('logout','ViewController@getLogout');
Route::post('signing','ViewController@signin');
Route::get('view','UserController@view');
Route::post('create','UserController@create');


Route::prefix('customers')->middleware('auth')->group(function () {

    Route::get('/','Customers\CustomersController@index');
    Route::post('/check','Customers\CustomersController@customers');
    Route::get('/create','Customers\CustomersController@index');
    Route::post('/createUser','Customers\CustomersController@createUser');
    Route::get('/view/details_bidders','Customers\CustomersController@ViewCustomer_bidders');
    Route::post('/create','Customers\CustomersController@create');
    Route::post('/update_bidders','Customers\CustomersController@update_bidders');
    Route::get('/delete','Customers\CustomersController@delete');
    Route::post('/items','Customers\CustomersController@view_item');
    Route::get('/item/particular','Customers\CustomersController@particular_item');
    Route::post('/transactions_bidders','Customers\CustomersController@customer_transactions_bidders');

    //BidsController Routes

    Route::post('/bids','BidsController@userbids');
    Route::post('/acceptedbids','BidsController@acceptedbids');
    Route::post('/items','BidsController@items');
    Route::post('/createItem','BidsController@createItem');

    //PostsController Routes

    Route::post('/posts','PostsController@userposts');
    Route::post('/bids_under_post','PostsController@bids_under_post');
    Route::get('/view/details_poster','PostsController@viewposter');
    Route::post('/post/acceptedbid','PostsController@post_acceptedbid');
    Route::post('/post/allacceptedbids','PostsController@allacceptedbids');

});