<?php

use Illuminate\Support\Facades\Route;
// use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ServiceController;

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
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //มาจาก Models User.php
    // $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    //Depertment
    Route::get('/department/all', [DepartmentController::class, 'index'])->name('department');
    Route::post('/department/add', [DepartmentController::class, 'store'])->name('addDepartment');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('editDepartment');
    Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->name('updateDepartment');

    //SoftDelete
    Route::get('/department/softdelete/{id}', [DepartmentController::class, 'softdelete']);
    Route::get('/department/restore/{id}', [DepartmentController::class, 'restore'])->name('restoreDepartment');
    Route::get('/department/delete/{id}', [DepartmentController::class, 'delete']);

    //Services
    Route::get('/services/all', [ServiceController::class, 'index'])->name('services');
});

