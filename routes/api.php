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

Route::resource('companies', 'CompaniesController',[
	'only' => ['index', 'store','update','destroy'],
]);

Route::resource('meetings', 'MeetingController',[
	'only' => ['index', 'store','update','destroy'],
]);

Route::resource('msRooms', 'MsRoomController',[
	'only' => ['index', 'store','update','destroy'],
]);

Route::resource('projects', 'ProjectController',[
	'only' => ['index', 'store','update','destroy'],
]);

Route::resource('rooms', 'RoomController',[
	'only' => ['index', 'store','update','destroy'],
]);

Route::resource('roomFiles', 'RoomFileController',[
	'only' => ['index', 'store','update','destroy'],
]);