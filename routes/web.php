<?php
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\GestionHospitalariaController;
use App\Http\Controllers\HospitalesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PacientesController::class, 'index'])->name('pacientes.index');
Route::post('/store', [PacientesController::class, 'store'])->name('pacientes.store');
Route::get('/show/{no_documento}', [PacientesController::class, 'show'])->name('pacientes.show');
Route::get('/edit/{no_documento}', [PacientesController::class, 'edit'])->name('pacientes.edit');
Route::put('/update/{no_documento}', [PacientesController::class, 'update'])->name('pacientes.update');
Route::delete('/destroy/{no_documento}', [PacientesController::class, 'destroy'])->name('pacientes.destroy');

Route::get('/hospitales', [HospitalesController::class, 'index'])->name('hospitales.index');
Route::post('/hospitales/store', [HospitalesController::class, 'store'])->name('hospitales.store');
Route::get('/hospitales/show/{cod_hospital}', [HospitalesController::class, 'show'])->name('hospitales.show');
Route::get('hospitales/edit/{cod_hospital}', [HospitalesController::class, 'edit'])->name('hospitales.edit');
Route::put('hospitales/update/{cod_hospital}', [HospitalesController::class, 'update'])->name('hospitales.update');
Route::delete('hospitales/destroy/{cod_hospital}', [HospitalesController::class, 'destroy'])->name('hospitales.destroy');

Route::get('/gestionhospitalaria', [GestionHospitalariaController::class, 'index'])->name('gestionhospitalaria.index');
Route::get('/gestionhospitalaria/show/{id}', [GestionHospitalariaController::class, 'show'])->name('gestionhospitalaria.show');
Route::get('/gestionhospitalaria/create', [GestionHospitalariaController::class, 'create'])->name('gestionhospitalaria.create');
Route::post('/gestionhospitalaria/store', [GestionHospitalariaController::class, 'store'])->name('gestionhospitalaria.store');
Route::get('/gestionhospitalaria/edit/{id}', [GestionHospitalariaController::class, 'edit'])->name('gestionhospitalaria.edit');
Route::put('/gestionhospitalaria/update/{id}', [GestionHospitalariaController::class, 'update'])->name('gestionhospitalaria.update');
Route::delete('/gestionhospitalaria/destroy/{id}', [GestionHospitalariaController::class, 'destroy'])->name('gestionhospitalaria.destroy');
