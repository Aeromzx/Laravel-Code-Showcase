<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TodoListController;
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

Route::get('/', function () {return view('welcome');});

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

//customer
Route::get('/customer', [CustomerController::class, 'index'])->middleware(['auth'])->name('customer');
Route::post('/customer/create', [CustomerController::class, 'store'])->middleware(['auth'])->name('storeCustomer');
Route::get('/customer/destroy/{customerKey}', [CustomerController::class, 'destroy'])->middleware(['auth'])->name('destroyCustomer');

//employee
Route::get('/employee', [EmployeeController::class, 'index'])->middleware(['auth'])->name('employee');
Route::post('/employee/create', [EmployeeController::class, 'store'])->middleware(['auth'])->name('storeEmployee');
Route::get('/employee/destroy/{employeeKey}', [EmployeeController::class, 'destroy'])->middleware(['auth'])->name('destroyEmployee');

//todoList
Route::get('/todo', [TodoListController::class, 'index'])->middleware(['auth'])->name('todoList');
Route::post('/todo/create', [TodoListController::class, 'create'])->middleware(['auth'])->name('todoListCreate');
Route::post('/todo/createTodo/{id}/{employeeId}', [TodoListController::class, 'addComment'])->middleware(['auth'])->name('todoListAddComment');
Route::post('/todo/update/{id}/', [TodoListController::class, 'change'])->middleware(['auth'])->name('todoListUpdate');

Route::get('/projects', [ProjectsController::class, 'index'])->middleware(['auth'])->name('projects');
Route::post('/projects/store', [ProjectsController::class, 'store'])->middleware(['auth'])->name('storeProject');
Route::get('/projects/destroy/{projectKey}', [ProjectsController::class, 'destroy'])->middleware(['auth'])->name('destroyProject');


require __DIR__.'/auth.php';
