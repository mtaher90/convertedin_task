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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
Route::post('/tasks/store', 'TasksController@store')->name('tasks.store');
Route::get('/tasks', 'TasksController@index')->name('tasks.index');
Route::get('/tasks/count', 'TasksController@tasks_count')->name('tasks.count');

Route::get('/admin/list', 'TasksController@admins')->name('admin.list');
Route::get('/user/list', 'TasksController@users')->name('user.list');
