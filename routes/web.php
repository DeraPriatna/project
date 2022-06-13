<?php

use Illuminate\Support\Facades\Route;

// e-learning
use App\Http\Controllers\E_learning\UserController;
use App\Http\Controllers\E_learning\DosenController;
use App\Http\Controllers\E_learning\MahasiswaController;
use App\Http\Controllers\E_learning\MatkulController;
use App\Http\Controllers\E_learning\KelasController;
use App\Http\Controllers\E_learning\ForumController;
use App\Http\Controllers\E_learning\AbsensiController;
use App\Http\Controllers\E_learning\MateriController;
use App\Http\Controllers\E_learning\TugasController;

Route::get('/', function () {
    return view('welcome');
});

// e-learning
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','e_learning.admin.auths.login')->name('login');
        Route::post('/postlogin',[UserController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:web'])->group(function(){
        Route::view('/home','e_learning.admin.home')->name('home');
        Route::get('/logout',[UserController::class,'logout'])->name('logout');
        
        Route::get('/user',[UserController::class,'index'])->name('user');
        Route::view('/user/create','e_learning.admin.users.create')->name('user.create');
        Route::post('/user/store',[UserController::class,'store'])->name('user.store');
        Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
        Route::post('/user/update/{id}',[UserController::class,'update'])->name('user.update');
        Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');

        Route::get('/mahasiswa',[MahasiswaController::class,'index'])->name('mahasiswa');
        Route::view('/mahasiswa/create','e_learning.admin.mahasiswa.create')->name('mahasiswa.create');
        Route::post('/mahasiswa/store',[MahasiswaController::class,'store'])->name('mahasiswa.store');
        Route::get('/mahasiswa/edit/{id}',[MahasiswaController::class,'edit'])->name('mahasiswa.edit');
        Route::post('/mahasiswa/update/{id}',[MahasiswaController::class,'update'])->name('mahasiswa.update');
        Route::get('/mahasiswa/delete/{id}',[MahasiswaController::class,'delete'])->name('mahasiswa.delete');

        Route::get('/dosen',[DosenController::class,'index'])->name('dosen');
        Route::view('/dosen/create','e_learning.admin.dosen.create')->name('dosen.create');
        Route::post('/dosen/store',[DosenController::class,'store'])->name('dosen.store');
        Route::get('/dosen/edit/{id}',[DosenController::class,'edit'])->name('dosen.edit');
        Route::post('/dosen/update/{id}',[DosenController::class,'update'])->name('dosen.update');
        Route::get('/dosen/delete/{id}',[DosenController::class,'delete'])->name('dosen.delete');

        Route::get('/matkul',[MatkulController::class,'index'])->name('matkul');
        Route::view('/matkul/create','e_learning.admin.matkul.create')->name('matkul.create');
        Route::post('/matkul/store',[MatkulController::class,'store'])->name('matkul.store');
        Route::get('/matkul/edit/{id}',[MatkulController::class,'edit'])->name('matkul.edit');
        Route::post('/matkul/update/{id}',[MatkulController::class,'update'])->name('matkul.update');
        Route::get('/matkul/delete/{id}',[MatkulController::class,'delete'])->name('matkul.delete');

        Route::get('/kelas',[KelasController::class,'index'])->name('kelas');
        Route::get('/kelas/create',[KelasController::class,'create'])->name('kelas.create');
        Route::post('/kelas/store',[KelasController::class,'store'])->name('kelas.store');
        Route::get('/kelas/edit/{id}',[KelasController::class,'edit'])->name('kelas.edit');
        Route::post('/kelas/update/{id}',[KelasController::class,'update'])->name('kelas.update');
        Route::get('/kelas/delete/{id}',[KelasController::class,'delete'])->name('kelas.delete');
        Route::get('/kelas/member/{id}',[KelasController::class,'member'])->name('kelas.member');
        Route::post('/kelas/member/add/{id}',[KelasController::class,'add'])->name('kelas.member.add');
        Route::get('/kelas/member/remove/{id}',[KelasController::class,'remove'])->name('kelas.member.remove');
    });
});

Route::prefix('dosen')->name('dosen.')->group(function(){
    Route::middleware(['guest:dosen'])->group(function(){
        Route::view('/login','e_learning.dosen.auths.login')->name('login');
        Route::post('/postlogin',[DosenController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:dosen'])->group(function(){
        Route::get('/home',[DosenController::class,'home'])->name('home');
        Route::get('/logout',[DosenController::class,'logout'])->name('logout');
        
        Route::get('/{id}/forum',[ForumController::class,'index'])->name('forum');

        Route::get('/{id}/absensi',[AbsensiController::class,'index'])->name('absensi');
        
        Route::get('/{id}/materi',[MateriController::class,'index'])->name('materi');
        Route::get('/{id}/materi/create',[MateriController::class,'create'])->name('materi.create');
        Route::post('/{id}/materi/store',[MateriController::class,'store'])->name('materi.store');
        Route::get('/{id}/materi/edit/{id2}',[MateriController::class,'edit'])->name('materi.edit');
        Route::post('/{id}/materi/update/{id2}',[MateriController::class,'update'])->name('materi.update');
        Route::get('/materi/delete/{id2}',[MateriController::class,'delete'])->name('materi.delete');

        Route::get('/{id}/tugas',[TugasController::class,'index'])->name('tugas');
        Route::get('/{id}/tugas/create',[TugasController::class,'create'])->name('tugas.create');
        Route::post('/{id}/tugas/store',[TugasController::class,'store'])->name('tugas.store');
        Route::get('/{id}/tugas/edit/{id2}',[TugasController::class,'edit'])->name('tugas.edit');
        Route::post('/{id}/tugas/update/{id2}',[TugasController::class,'update'])->name('tugas.update');
        Route::get('/tugas/delete/{id2}',[TugasController::class,'delete'])->name('tugas.delete');

        Route::get('/download/{file}',[MateriController::class,'download'])->name('download');
    });
});

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function(){
    Route::middleware(['guest:mahasiswa'])->group(function(){
        Route::view('/login','e_learning.mahasiswa.auths.login')->name('login');
        Route::post('/postlogin',[MahasiswaController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:mahasiswa'])->group(function(){
        Route::get('/home',[MahasiswaController::class,'home'])->name('home');
        Route::get('/logout',[MahasiswaController::class,'logout'])->name('logout');
    });
});




