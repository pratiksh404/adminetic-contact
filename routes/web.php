<?php

use Illuminate\Support\Facades\Route;
use Adminetic\Contact\Http\Controllers\Admin\GroupController;
use Adminetic\Contact\Http\Controllers\Admin\ContactController;

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

Route::resource('contact', ContactController::class);
Route::resource('group', GroupController::class);

/* SINGLE ROUTES */
Route::post('import-contacts', [ContactController::class, 'import'])->name('import_contacts');
Route::post('export-contacts', [ContactController::class, 'export'])->name('export_contacts');
