<?php

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('welcome', function(){
    return response()->json(['data' => 'Bienvenido a la API Admin Freelance'], Response::HTTP_OK);
});


Route::group([      
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
    Route::get('client/{id}', 'PasswordResetController@findClient');
});


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
    Route::get('user/{email}', 'AuthController@getOnlyUser');
 
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');  
    });
});


Route::group([
    'prefix' => 'patient'
], function () { 
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('proof', function(){
            return [ 'message' => 'Vista de los paciente'];
        });  
    });
});

Route::group([
    'prefix' => 'stats'
], function () { 
    Route::group([
      'middleware' => ['isStats']
    ], function() {
        Route::get('proof', function(){
            return [ 'message' => 'Visualizarlos de estásticas'];
        });  
    });
});



