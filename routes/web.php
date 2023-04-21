<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
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



Route::get('language/{locale}',function ($locale){ app()->setLocale($locale);
    session()->put('locale',$locale);
    return redirect()->back();
})->name('language');

Route::middleware('localization')->group(function(){

    Route::get('/', function () {
        return view('register');
    });
Route::controller(AuthController::class)->group(function(){

    Route::post('/register','UserRegister')->name('create.user');
    Route::get('/login-form','loginForm')->name('login.form');
    Route::post('/loginn','loginn')->name('loginn');
    Route::get('/logout','destroy')->name('logout');
});


Route::controller(AllUsersController::class)->group(function(){
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/edit/profile','editProfile')->name('edit.profile');
    Route::post('/update/profile','updateProfile')->name('update.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});


// Route::middleware(['is_admin'])->name('admin')->prefix('admin')->group(function(){
//     Route::get('/', [AdminController::class, 'index']);

// });

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
});


// Route::middleware(['can:access'])->name('admin.')->prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('index');
// });

});