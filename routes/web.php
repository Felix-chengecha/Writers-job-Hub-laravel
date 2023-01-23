<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

    Route::get('/redirect', [AdminController::class, 'redirect'])->name('redirect')->middleware('usercheck');


    Route::get('dash', [AdminController::class, 'index'])   ->middleware('usercheck');

    Route::get('dash1', [AdminController::class, 'index1']) ->middleware('usercheck');
    Route::get('dash2', [AdminController::class, 'index2']) ->middleware('usercheck');
    Route::get('dash3', [AdminController::class, 'index3']) ->middleware('usercheck');

    Route::get('writers', [AdminController::class, 'writers'])     ->middleware('usercheck');
    Route::get('aproject', [AdminController::class, 'add_project_view'])      ->middleware('usercheck');
    Route::get('projects', [AdminController::class, 'projects'])   ->middleware('usercheck');

    Route::post('add_project', [AdminController::class, 'add_project']) ->middleware('usercheck');

    Route::post('writer_details', [AdminController::class, 'writers_details'])->middleware('usercheck');
    Route::post('project_details', [AdminController::class, 'project_details'])->middleware('usercheck');

    Route::post('replynow', [AdminController::class, 'reply_now'])->middleware('usercheck');

    Route::post('reply1', [AdminController::class, 'reply1'])->middleware('usercheck');
    Route::post('reply2', [AdminController::class, 'reply2'])->middleware('usercheck');
    Route::post('addcomments', [AdminController::class, 'add_comment'])->middleware('usercheck');




Route::get('/', function () { return view('welcome'); });

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('wsearch', [HomeController::class, 'search']);
Route::get('nav/{id}', [HomeController::class, 'nav']);
Route::get('category/{di}', [HomeController::class, 'categ']);
Route::get('myjobs', [HomeController::class, 'myjobs']);
Route::post('addcomment', [HomeController::class, 'add_comment']);
Route::post('addreply', [HomeController::class, 'add_reply']);
Route::post('bid', [HomeController::class, 'bid']);



















