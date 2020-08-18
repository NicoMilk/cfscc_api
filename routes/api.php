<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;   //TODO a virer si fct login deplacee


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'users' => 'UserController',
    'blogposts' => 'BlogpostController',
    'events' => 'EventController',
    'registrations' => 'RegistrationController',
]);

Route::post('/register', 'UserController@store');
Route::post('/login', 'UserController@login');

Route::middleware('auth:sanctum')->post('/logout', 'UserController@logout');

Route::middleware('auth:sanctum')->post('/registrations', 'RegistrationController@store');

Route::middleware('auth:sanctum')->post('/events', 'EventController@store');
// Route::patch('/events', 'EventController@updateCounters');

Route::middleware('auth:sanctum')->post('/blogposts', 'BlogpostController@store');