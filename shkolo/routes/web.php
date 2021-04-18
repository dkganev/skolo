<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shkolo\Shkolo;
use App\Models\Task;


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



//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [Shkolo::class, 'Index']);

Route::get('/shkolo', [Shkolo::class, 'Index']);

Route::get('/modal/{id}', [Shkolo::class, 'Modal']);

Route::post('/update', [Shkolo::class, 'Update']);

//Route::get('/tasks', function () {
//return view('tasks',['tasks' => array('#dc3545', '#6610f2', '#198754', '#ffc107', '#0dcaf0;', '#6c757d', '#198754', '#fd7e14', '#d63384')]); //, ['tasks' => Task::all()]);
//});
