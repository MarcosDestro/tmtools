<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ToolController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginDo', [LoginController::class, 'loginDo'])->name('loginDo');

// Rotas protegidas
Route::group(['middleware' => ['auth']], function () {
    Route::get('/tmtools', [ToolController::class, 'tmtoolsall'])->name('tmtoolsall');
    Route::get('/createtool', [ToolController::class, 'createTool'])->name('createTool');
    Route::post('/storetool', [ToolController::class, 'storetool'])->name('storetool');

    Route::get('/showtool/{id}', [ToolController::class, 'showtool'])->name('showtool');
    Route::post('/updatetool/{id}', [ToolController::class, 'updatetool'])->name('updatetool');
    Route::get('/deletetool/{id}', [ToolController::class, 'deletetool'])->name('deletetool');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
