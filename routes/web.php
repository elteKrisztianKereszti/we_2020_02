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

Route::get('/projects', [ProjectController::class, 'index']);
Route::view('/projects/create', 'projects.create');
Route::get('/projects/{id}/show', [ProjectController::class, 'show'] );
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'] );
Route::put('/projects/{id}', [ProjectController::class, 'update'] );
Route::post('projects/create', [ProjectController::class, 'store'] );

