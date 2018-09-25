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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/*
Groups all the message under the version of the api (v1)
*/

Route::group(['prefix'=>'/v1'], function(){
	Route::post('/register', 'Auth\RegisterController@register');	
	Route::post('/login', 'Auth\LoginController@login');	
	
	//Groups all message that need an logged user ( with a valid api_token) to work
	Route::group(['middleware' => 'auth:api'], function(){		
		Route::post('/logout', 'Auth\LoginController@logout');
		
		Route::post('/deactivate', 'Auth\LoginController@deactivate');
	
		Route::get('/user', function(Request $request){
			return response()->json( Auth::guard('api')->user(), 201);
		});
		
		Route::group(['prefix'=>'/user'], function(){
			Route::post('/clinic', 'ClinicController@update_profile');
		});
	});	
});
