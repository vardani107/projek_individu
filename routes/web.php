<?php

use Illuminate\Support\Facades\Route;
use App\hHttpttp\Controllers\DashboardController;
use App\Http\Controllers\mastersiswaController;
use App\Http\Controllers\masterkontakcontroller;
use App\Http\Controllers\masterprojectController;
use App\Http\Controllers\loginController;

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





//guest
route::middleware('guest')->group(function(){
    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login', [loginController::class, 'authenticate']);
   

        Route::get('/', function () {
        return view('home');
    });


    Route::get('/admin', function () {
        return view('layout.admin');
    });

    Route::get('/home', function () {
        return view('home');
    });


    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/project', function () {
        return view('project');
    });

    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('/TambahProject', function () {
        return view('TambahProject');
    });

});




//controller
route::middleware('auth')->group(function(){
    Route::resource('/mastersiswa', mastersiswaController::class);
    Route::get('mastersiswa/{id_siswa}/hapus', [mastersiswaController::class, 'hapus'])->name('mastersiswa.hapus');
    Route::resource('/masterkontak', masterkontakController::class);
    Route::get('masterproject/create/{id_siswa}', [masterprojectController::class, 'tambah'])->name('masterproject.tambah');
    Route::resource('/masterproject', masterprojectController::class);
    Route::get('masterproject/{id_siswa}/hapus', [masterprojectController::class, 'hapus'])->name('masterproject.hapus');
    Route::resource('/dashboard', DashboardController::class);
    Route::post('logout', [loginController::class, 'logout']);


});

