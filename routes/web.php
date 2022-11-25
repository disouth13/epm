<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mht\MhtController;
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

Route::controller(MhtController::class)->group(function () {
    Route::get('mht/index/psdc', 'IndexPsdc')->name('index-psdc');
    Route::get('mht/add/psdc', 'AddPsdc')->name('add-psdc');
    Route::post('mht/store/psdc', 'StorePsdc')->name('store-psdc');
});

// admin group controller
Route::controller(AdminController::class)->group(function () {
    Route::get('admin/logout', 'destroy')->name('admin-logout');
    Route::get('admin/profile', 'Profile')->name('admin-profile');
    Route::get('admin/profile/edit', 'EditProfile')->name('edit-profile');
    Route::post('admin/profile/store', 'StoreProfile')->name('store-profile');

    // change password
    Route::get('admin/change/password', 'ChangePassword')->name('change-password');
    Route::post('admin/update/password', 'UpdatePassword')->name('update-password');
});

Route::get('/dashboard', function () {
    return view('admin.layouts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
