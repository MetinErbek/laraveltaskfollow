<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskStatusesController;
use App\Http\Controllers\TasksController;

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



Route::middleware(['auth'])->group(function(){
  Route::resource('taskstatuses', TaskStatusesController::class);
  Route::resource('tasks', TasksController::class);
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
  Route::post('/taskstatuschange', [TasksController::class, 'taskStatusChange']);
});

Route::get('logout', function(){
  Session::flush();
  Auth::logout();
  return redirect('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
