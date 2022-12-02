<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mht\MhtController;
use App\Http\Controllers\Mht\PfeController;
use App\Http\Controllers\Mht\PrsController;
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


// group manhattan PSDC
Route::controller(MhtController::class)->group(function () {
    Route::get('mht/index/psdc', 'IndexPsdc')->name('index-psdc');
    Route::get('mht/add/psdc', 'AddPsdc')->name('add-psdc');
    Route::get('mht/view/psdc/{id}', 'ViewPsdc')->name('view-psdc');
    Route::post('mht/store/psdc', 'StorePsdc')->name('store-psdc');
    Route::get('mht/edit/psdc/{id}', 'EditPsdc')->name('edit-psdc');
    Route::post('mht/edit/psdc', 'UpdatePsdc')->name('update-psdc');
    Route::get('mht/delete/psdc/{id}', 'DeletePsdc')->name('delete-psdc');

});

// group manhattan PRS
Route::controller(PrsController::class)->group(function () {
    Route::get('mht/index/prs', 'IndexPrs')->name('index-prs');
    Route::get('mht/add/prs', 'AddPrs')->name('add-prs');
    Route::post('mht/store/prs', 'StorePrs')->name('store-prs');
    Route::get('mht/view/prs/{id}', 'ViewPrs')->name('view-prs');
    Route::get('mht/edit/prs/{id}', 'EditPrs')->name('edit-prs');
    Route::post('mht/update/prs', 'UpdatePrs')->name('update-prs');
    Route::get('mht/delete/prs/{id}', 'DeletePrs')->name('delete-prs');
});


// group manhattan PFE
Route::controller(PfeController::class)->group(function () {
    Route::get('mht/index/pfe', 'IndexPfe')->name('index-pfe');
    Route::get('mht/add/pfe', 'AddPfe')->name('add-pfe');
    Route::post('mht/store/pfe', 'StorePfe')->name('store-pfe');
    Route::get('mht/view/pfe/{id}', 'ViewPfe')->name('view-pfe');
    Route::get('mht/edit/pfe/{id}', 'EditPfe')->name('edit-pfe');
    Route::post('mht/update/pfe', 'UpdatePfe')->name('update-pfe');
    Route::get('mht/delete/pfe/{id}', 'DeletePfe')->name('delete-pfe');
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
