<?php

use App\Http\Controllers\Auth\Authenticate;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudioController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/login', function () {
  return view('auth.login');
})->name('login');

Route::get('/register', function () {
  return view('auth.register');
})->name('register');

Route::post('/register', [Authenticate::class, 'register'])->name('auth.register');

Route::post('/login', [Authenticate::class, 'login'])->name('auth.login');

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard.index');
  })->name('dashboard.index');
  Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
  Route::delete('/logout', [Authenticate::class, 'logout'])->name('auth.logout');
});

Route::middleware(['auth', 'user.access:admin'])->group(function () {
  Route::resource('movie', MovieController::class);
  Route::resource('branch', BranchController::class);
  Route::resource('studio', StudioController::class);
  // Route::resource('schedule', ScheduleController::class);
  Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
  Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
  Route::get('/schedule/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
  Route::patch('/schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
  Route::put('/schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
  Route::delete('/schedule/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
});

// Route::get('/artisan', function () {
//   Artisan::call('make:controller CobaController');
// });
