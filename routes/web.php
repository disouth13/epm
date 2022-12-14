<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// mht
use App\Http\Controllers\Mht\MuController;
use App\Http\Controllers\Mht\MhtController;
use App\Http\Controllers\Mht\PfeController;
use App\Http\Controllers\Mht\PrsController;
use App\Http\Controllers\Mht\PpakController;

// ktp
use App\Http\Controllers\Ktp\MuKtpController;
use App\Http\Controllers\Ktp\PsdcController;
use App\Http\Controllers\Ktp\PpakKtpController;
use App\Http\Controllers\Ktp\PrsKtpController;
use App\Http\Controllers\Ktp\PfeKtpController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('frontend-page');
});

// register


//group Ketapang PSDC
Route::controller(PsdcController::class)->group(function () {
    Route::get('ktp/index/psdc', 'IndexPsdc')->name('index-psdc-ktp');
    Route::get('ktp/add/psdc', 'AddPsdc')->name('add-psdc-ktp');
    Route::get('ktp/view/psdc/{id}', 'ViewPsdc')->name('view-psdc-ktp');
    Route::post('ktp/store/psdc', 'StorePsdc')->name('store-psdc-ktp');
    Route::get('ktp/edit/psdc/{id}', 'EditPsdc')->name('edit-psdc-ktp');
    Route::post('ktp/edit/psdc', 'UpdatePsdc')->name('update-psdc-ktp');
    Route::get('ktp/delete/psdc/{id}', 'DeletePsdc')->name('delete-psdc-ktp');

});

// group Ketapang PRS
Route::controller(PrsKtpController::class)->group(function () {
    Route::get('ktp/index/prs', 'IndexPrs')->name('index-prs-ktp');
    Route::get('ktp/add/prs', 'AddPrs')->name('add-prs-ktp');
    Route::post('ktp/store/prs', 'StorePrs')->name('store-prs-ktp');
    Route::get('ktp/view/prs/{id}', 'ViewPrs')->name('view-prs-ktp');
    Route::get('ktp/edit/prs/{id}', 'EditPrs')->name('edit-prs-ktp');
    Route::post('ktp/update/prs', 'UpdatePrs')->name('update-prs-ktp');
    Route::get('ktp/delete/prs/{id}', 'DeletePrs')->name('delete-prs-ktp');

});

// group ktp PFE
Route::controller(PfeKtpController::class)->group(function () {
    Route::get('ktp/index/pfe', 'IndexPfe')->name('index-pfe-ktp');
    Route::get('ktp/add/pfe', 'AddPfe')->name('add-pfe-ktp');
    Route::post('ktp/store/pfe', 'StorePfe')->name('store-pfe-ktp');
    Route::get('ktp/view/pfe/{id}', 'ViewPfe')->name('view-pfe-ktp');
    Route::get('ktp/edit/pfe/{id}', 'EditPfe')->name('edit-pfe-ktp');
    Route::post('ktp/update/pfe', 'UpdatePfe')->name('update-pfe-ktp');
    Route::get('ktp/delete/pfe/{id}', 'DeletePfe')->name('delete-pfe-ktp');
});


// group Ktp PPAK
Route::controller(PpakKtpController::class)->group(function () {
    Route::get('ktp/index/ppak', 'IndexPpak')->name('index-ppak-ktp');
    Route::get('ktp/add/ppak', 'AddPpak')->name('add-ppak-ktp');
    Route::post('ktp/store/ppak', 'StorePpak')->name('store-ppak-ktp');
    Route::get('ktp/view/ppak/{id}', 'ViewPpak')->name('view-ppak-ktp');
    Route::get('ktp/edit/ppak/{id}', 'EditPpak')->name('edit-ppak-ktp');
    Route::post('ktp/update/ppak', 'UpdatePpak')->name('update-ppak-ktp');
    Route::get('ktp/delete/ppak{id}', 'DeletePpak')->name('delete-ppak-ktp');
});


// group Ktp MU
Route::controller(MuKtpController::class)->group(function () {
    Route::get('ktp/index/mu', 'IndexMu')->name('index-mu-ktp');
    Route::get('ktp/add/mu', 'AddMu')->name('add-mu-ktp');
    Route::post('ktp/store/mu', 'StoreMu')->name('store-mu-ktp');
    Route::get('ktp/view/mu/{id}', 'ViewMu')->name('view-mu-ktp');
    Route::get('ktp/edit/mu/{id}', 'EditMu')->name('edit-mu-ktp');
    Route::post('ktp/update/mu', 'UpdateMu')->name('update-mu-ktp');
    Route::get('ktp/delete/mu/{id}', 'DeleteMu')->name('delete-mu-ktp');
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

// group manhttan PPAK
Route::controller(PpakController::class)->group(function () {
    Route::get('mht/index/ppak', 'IndexPpak')->name('index-ppak');
    Route::get('mht/add/ppak', 'AddPpak')->name('add-ppak');
    Route::post('mht/store/ppak', 'StorePpak')->name('store-ppak');
    Route::get('mht/view/ppak/{id}', 'ViewPpak')->name('view-ppak');
    Route::get('mht/edit/ppak/{id}', 'EditPpak')->name('edit-ppak');
    Route::post('mht/update/ppak', 'UpdatePpak')->name('update-ppak');
    Route::get('mht/delete/ppak{id}', 'DeletePpak')->name('delete-ppak');
});

// group manhttan MU
Route::controller(MuController::class)->group(function () {
    Route::get('mht/index/mu', 'IndexMu')->name('index-mu');
    Route::get('mht/add/mu', 'AddMu')->name('add-mu');
    Route::post('mht/store/mu', 'StoreMu')->name('store-mu');
    Route::get('mht/view/mu/{id}', 'ViewMu')->name('view-mu');
    Route::get('mht/edit/mu/{id}', 'EditMu')->name('edit-mu');
    Route::post('mht/update/mu', 'UpdateMu')->name('update-mu');
    Route::get('mht/delete/mu/{id}', 'DeleteMu')->name('delete-mu');
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
