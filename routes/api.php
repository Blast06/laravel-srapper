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

Route::get('/groups/countries/{id}', 'api\GroupController@getGroupsByCountry');
Route::get('/groups/categories/{id}', 'api\GroupController@getGroupsByCategory');
Route::get('/groups/tags/{id}', 'api\GroupController@getGroupsByTag');
Route::get('/groups/types/{id}', 'api\GroupController@getGroupsByType');
Route::apiResource('/groups', 'api\GroupController');
Route::apiResource('/tags', 'api\TagController');
Route::apiResource('/countries', 'api\CountryController');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('signup', 'Auth\AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
    });
});

//
