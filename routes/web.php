<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::get('/', function () {
    return view('index');
});
// Also can be used:
// Route::view('/', 'index');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.list');

Route::get('/projects/{id}/show', [ProjectController::class, 'show'] )->name('projects.show');

Route::view('/projects/create', 'projects.create')->name('projects.create');
Route::post('projects/create', [ProjectController::class, 'store'] )->name('projects.store');

Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'] )->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'] )->name('projects.update');
Route::delete('/projects/{id}', [ProjectController::class, 'delete'] )->name('projects.delete');

