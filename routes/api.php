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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => ['auth:api']
], function () {

	Route::resource('discussedItems', 'DiscussedItemController',[
		'only' => ['index', 'store','update','destroy'],
	]);

	Route::resource('discussedItemFiles', 'DiscussedItemFileController',[
		'only' => ['index', 'store','update','destroy'],
	]);

	Route::resource('discussedItemIssues', 'DiscussedItemIssueController',[
		'only' => ['index', 'store','update','destroy'],
	]);

	Route::resource('items', 'itemController',[
		'only' => ['index', 'store','update','destroy'],
	]);

	Route::resource('meetings', 'MeetingController',[
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

	Route::group([
	    'middleware' => ['can:manage-datmas']
	], function () {

		Route::resource('user', 'UserController',[
			'only' => ['index','store','update','destroy'],
		])->middleware('can:manage-user');

		Route::resource('msDescriptiveFinishing', 'MsDescriptiveFinishingController',[
			'only' => ['index', 'store','update','destroy'],
		]);

		Route::resource('msItems', 'MsItemController',[
			'only' => ['index', 'store','update','destroy'],
		]);

		Route::resource('msItemDetails', 'MsItemDetailController',[
			'only' => ['index', 'store','update','destroy'],
		]);

		Route::resource('msItemTypes', 'MsItemTypeController',[
			'only' => ['index', 'store','update','destroy'],
		]);

		Route::resource('msRooms', 'MsRoomController',[
			'only' => ['index', 'store','update','destroy'],
		]);

		Route::resource('companies', 'CompaniesController',[
			'only' => ['index', 'store','update','destroy'],
		]);
	});
});
