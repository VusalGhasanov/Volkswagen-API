<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function (){
    Route::get('/login','UserController@login')->name('login')->middleware('admin.guest');
    Route::post('/login/control','UserController@loginControl')->name('login.control');
    Route::middleware('is.admin')->group(function(){
        Route::get('/home','HomeController@index')->name('home');
        Route::get('/logout','UserController@logout')->name('logout');

        /** SiteConfigs Routes */
        Route::get('/configs', 'ConfigController@show')->name('configs.show');
        Route::put('/configs/update', 'ConfigController@update')->name('configs.update');

        /** Test Drive Forums Routes */
        Route::get('/forums', 'ForumController@index')->name('forums');
        Route::get('/forums/show/{id}', 'ForumController@show')->name('forums.show');
        Route::get('/forums/destroy/{id}', 'ForumController@destroy')->name('forums.destroy');

        /** Suggest Forums Routes */
        Route::get('/suggest', 'SuggestController@index')->name('suggests');
        Route::get('/suggest/show/{id}', 'SuggestController@show')->name('suggests.show');
        Route::get('/suggest/destroy/{id}', 'SuggestController@destroy')->name('suggests.destroy');

        /** User Routes */
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/users/create', 'UserController@create')->name('users.create');
        Route::post('/users/store', 'UserController@store')->name('users.store');
        Route::get('/users/{id}', 'UserController@show')->name('users.show');
        Route::put('/users/{id}', 'UserController@update')->name('users.update');
        Route::get('/users/destroy/{id}', 'UserController@destroy')->name('users.destroy');

        /** Menu Routes */
        Route::get('/menus', 'MenuController@index')->name('menus');
        Route::get('/menus/create/sub/{id}', 'MenuController@sub')->name('menus.sub.create');
        Route::get('/menus/create', 'MenuController@create')->name('menus.create');
        Route::post('/menus/store', 'MenuController@store')->name('menus.store');
        Route::get('/menus/{id}', 'MenuController@show')->name('menus.show');
        Route::put('/menus/{id}', 'MenuController@update')->name('menus.update');
        Route::get('/menus/destroy/{id}', 'MenuController@destroy')->name('menus.destroy');

        /** MenuOrders Routes */
        Route::get('/sort/menu', 'MenuSortController@index')->name('sort.menu');
        Route::post('/sort/menu/update', 'MenuSortController@update')->name('sort.menu.update');

        /** Page Routes */
        Route::get('/pages', 'PageController@index')->name('pages');
        Route::get('/pages/create', 'PageController@create')->name('pages.create');
        Route::get('/pages/store', 'PageController@store')->name('pages.store');
        Route::get('/pages/show/{id}', 'PageController@show')->name('pages.show');
        Route::get('/pages/edit/{id}', 'PageController@edit')->name('pages.edit');
        Route::get('/pages/update/{id}', 'PageController@update')->name('pages.update');
        Route::get('/pages/destroy/{id}', 'PageController@destroy')->name('pages.destroy');

        /** Components Routes */
        Route::get('/components/create', 'ComponentController@create')->name('components.create');
        Route::post('/components/store', 'ComponentController@store')->name('components.store');
        Route::get('/components/show/{page_id}/{component_id}/{index}', 'ComponentController@show')->name('components.show');
        Route::put('/components/update/{id}', 'ComponentController@update')->name('components.update');
        Route::get('/components/destroy/{page_id}/{component_id}/{index}', 'ComponentController@destroy')->name('components.destroy');

         /** ComponentOrders Routes */
        Route::post('/sort/components/update', 'ComponentSortController@update')->name('sort.components.update');

         /** Car Routes */
        Route::get('/cars','CarsController@index')->name('cars');
        Route::get('/cars/create','CarsController@create')->name('cars.create');
        Route::post('/cars/store','CarsController@store')->name('cars.store');
        Route::get('/cars/show/{id}','CarsController@show')->name('cars.show');
        Route::put('/cars/update/{id}','CarsController@update')->name('cars.update');
        Route::get('/cars/destroy/{id}','CarsController@destroy')->name('cars.destroy');

        /** Car Order Routes */
        Route::get('/sort/cars', 'CarSortController@index')->name('sort.cars');
        Route::post('/sort/cars/update', 'CarSortController@update')->name('sort.cars.update');

        /** News Routes */
        Route::get('/news','NewsController@index')->name('news');
        Route::get('/news/create','NewsController@create')->name('news.create');
        Route::post('/news/store','NewsController@store')->name('news.store');
        Route::get('/news/show/{id}','NewsController@show')->name('news.show');
        Route::put('/news/update/{id}','NewsController@update')->name('news.update');
        Route::get('/news/destroy/{id}','NewsController@destroy')->name('news.destroy');

        /** Credit Routes */
        Route::get('/credits','CreditController@index')->name('credits');
        Route::get('/credits/create','CreditController@create')->name('credits.create');
        Route::post('/credits/store','CreditController@store')->name('credits.store');
        Route::get('/credits/show/{id}','CreditController@show')->name('credits.show');
        Route::put('/credits/update/{id}','CreditController@update')->name('credits.update');
        Route::get('/credits/destroy/{id}','CreditController@destroy')->name('credits.destroy');

        /** Lising Routes */
        Route::get('/lising','LisingController@index')->name('lising');
        Route::get('/lising/create','LisingController@create')->name('lising.create');
        Route::post('/lising/store','LisingController@store')->name('lising.store');
        Route::get('/lising/show/{id}','LisingController@show')->name('lising.show');
        Route::put('/lising/update/{id}','LisingController@update')->name('lising.update');
        Route::get('/lising/destroy/{id}','LisingController@destroy')->name('lising.destroy');
    });
});
