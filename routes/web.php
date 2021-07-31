<?php

use App\Http\Livewire\Admin\Roles;
use App\Http\Livewire\Admin\Students;
use App\Http\Livewire\Admin\Users;
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

Route::get('/', function () {
    return redirect('verify');
});

Auth::routes();

Route::get('/verify', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['admin'])->group(function () {
    Route::get('admin/students', Students::class)->name('admin.students');
    Route::get('admin/roles', Roles::class)->name('admin.roles');
    Route::get('admin/users', Users::class)->name('admin.users');
});
