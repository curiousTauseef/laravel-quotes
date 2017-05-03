<?php

use Illuminate\Http\Request;

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

//get quotes
Route::get('/quotes', ['uses'=> 'QuoteController@getQuotes']);

//get single quote
Route::get('/quote/{id}', ['uses'=> 'QuoteController@getQuote']);

//create quotes
Route::post('/quote', ['uses'=> 'QuoteController@postQuote']);

//update quotes
Route::put('/quote/{id}', ['uses'=> 'QuoteController@putQuote']);

//delete quotes
Route::delete('/quote/{id}', ['uses'=> 'QuoteController@deleteQuote']);
