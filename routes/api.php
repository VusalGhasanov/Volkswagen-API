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

Route::namespace('API')->group(function (){
    Route::get('/pages/{slug}','PageController@index');
    Route::get('/navigations','NavigationController@index');
    Route::get('/news','NewsController@index');
    Route::get('/news/{slug}','NewsController@findBySlug');
    Route::get('/car/{slug}','CarController@car');
    Route::get('/cars','CarController@cars');
    Route::post('/forum/testdrive','ForumController@testDriveForum');
    Route::post('/forum/suggest','ForumController@suggestForum');
    Route::get('/contacts','ContactController@index');
    Route::get('/credits','CreditController@index');
    Route::get('/credits/{id}','CreditController@findById');
});
