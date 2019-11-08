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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::group([
    'prefix' => 'projects',
    'middleware' => ['auth', 'activated']
], function () {
    
    Route::get('/', function() {
        return view('projects.index');
    })->name('project.list');

});

Route::group([
    'prefix' => 'data_master',
    'middleware' => ['auth', 'activated']
], function () {

    Route::get('/users', function() {
    	return view('masters.users');
    })->name('user.list');

    Route::get('/companies', function() {
    	return view('masters.companies');
    })->name('company.list');

    Route::get('/rooms', function() {
    	return view('masters.rooms');
    })->name('room.list');

    Route::group([
    	'prefix' => 'items',
    	'namespace' => 'Item',
    ], function(){

		Route::get('/items', function() {
    		return view('masters.items.items');
    	})->name('item.list');

        Route::get('/items/details/{itemId}', function() {
            return view('masters.items.item_detail');
        })->name('item.detail');

        Route::get('/types', function() {
            return view('masters.items.types');
        })->name('type.list');


		Route::get('/details', function() {
    		return view('masters.items.details');
    	})->name('detail.list');


		Route::get('/finishings', function() {
    		return view('masters.items.finishings');
    	})->name('finishing.list');

    });

});
