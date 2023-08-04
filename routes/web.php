<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TicketController as TicketAdminController;
use App\Http\Controllers\Client\TicketController as TicketClientController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Mail\MailController;
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
Route::middleware('checkLogin')->group(function (){
    Route::prefix('admin')->name('admin.')->group(function (){
        Route::prefix('users')->name('users.')->group(function (){
            Route::get('/', [ClientController::class, 'layout'])->name('list');
            Route::get('get-data', [ClientController::class, 'list']);

            Route::get('create', [ClientController::class, 'create'])->name('create');
            Route::post('store', [ClientController::class, 'store'])->name('store');

            Route::get('edit', [ClientController::class, 'edit'])->name('edit');
            Route::put('update', [ClientController::class, 'update'])->name('update');

            Route::delete('delete', [ClientController::class, 'delete'])->name('delete');
        });

        Route::prefix('tickets')->name('tickets.')->group(function (){
            Route::get('/', [TicketAdminController::class, 'layout'])->name('list');
            Route::get('get-data', [TicketAdminController::class, 'list']);

            Route::get('create', [TicketAdminController::class, 'create'])->name('create');
            Route::post('store', [TicketAdminController::class, 'store'])->name('store');

            Route::get('edit', [TicketAdminController::class, 'edit'])->name('edit');
            Route::put('update', [TicketAdminController::class, 'update'])->name('update');

            Route::delete('delete', [TicketAdminController::class, 'delete'])->name('delete');
        });

        Route::prefix('questions')->name('questions.')->group(function (){
            Route::get('/', [QuestionController::class, 'layout'])->name('list');
            Route::get('get-data', [QuestionController::class, 'list']);

            Route::get('create', [QuestionController::class, 'create'])->name('create');
            Route::post('store', [QuestionController::class, 'store'])->name('store');

            Route::get('edit', [QuestionController::class, 'edit'])->name('edit');
            Route::put('update', [QuestionController::class, 'update'])->name('update');

            Route::delete('delete', [QuestionController::class, 'delete'])->name('delete');
        });

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('mail')->name('mail.')->group(function (){
            Route::get('send-only-admin', [MailController::class, 'sendOnlyAdmin'])->name('sendOnlyAdmin');
        });
    });
    Route::name('client.')->group(function (){
        Route::get('search',[HomeController::class,'search'])->name('search');
        Route::get('list',[TicketClientController::class,'list'])->name('list');
        Route::get('detail',[TicketClientController::class,'detail'])->name('detail');
        Route::get('create',[TicketClientController::class,'create'])->name('create');
        Route::post('store',[TicketClientController::class,'store'])->name('store');
    });
});

Route::middleware('checkLogout')->prefix('/')->name('form.')->group(function (){
    Route::get('/login',[AuthController::class,'getLogin'])->name('getLogin');
    Route::post('/login',[AuthController::class,'postLogin'])->name('postLogin');

    Route::get('/register',[AuthController::class,'getRegister'])->name('getRegister');
    Route::post('/register',[AuthController::class,'postRegister'])->name('postRegister');
});

Route::get('/',[HomeController::class,'layout'])->name('home');