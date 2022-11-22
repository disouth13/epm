<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\AdminController;

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
});

// admin group controller
Route::controller(AdminController::class)->group(function () {
    Route::get('admin/profile', 'Profile')->name('admin-profile');
    Route::get('admin/profile/edit', 'EditProfile')->name('edit-profile');
    Route::post('admin/profile/store', 'StoreProfile')->name('store-profile');

    // change password
    Route::get('admin/change/password', 'ChangePassword')->name('change-password');
});

Route::get('/dashboard', function () {
    return view('admin.layouts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
