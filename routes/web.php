<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ClientController as ClientAdminController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TicketController as TicketAdminController;
use App\Http\Controllers\Client\ClientController as ClientClientController;
use App\Http\Controllers\Client\TicketController as TicketClientController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
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
    Route::middleware('checkRole')->prefix('admin')->name('admin.')->group(function (){
        Route::prefix('dashboard')->group(function (){
            Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::get('statistical', [DashboardController::class, 'statistical']);
        });

        Route::prefix('users')->name('users.')->group(function (){
            Route::get('/', [ClientAdminController::class, 'layout'])->name('list');
            Route::get('get-data', [ClientAdminController::class, 'list']);
            Route::middleware('checkRoleSuperAdmin')->group(function (){
                Route::get('create', [ClientAdminController::class, 'create'])->name('create');
                Route::post('store', [ClientAdminController::class, 'store'])->name('store');

                Route::get('edit', [ClientAdminController::class, 'edit'])->name('edit');
                Route::put('update', [ClientAdminController::class, 'update'])->name('update');

                Route::delete('delete', [ClientAdminController::class, 'delete'])->name('delete');
            });
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

        Route::prefix('mail')->name('mail.')->group(function (){
            Route::get('send-only-admin', [MailController::class, 'sendOnlyAdmin'])->name('sendOnlyAdmin');
        });
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::name('client.')->group(function (){
        Route::get('search',[HomeController::class,'search'])->name('search');
        Route::get('list',[TicketClientController::class,'list'])->name('list');
        Route::get('detail',[TicketClientController::class,'detail'])->name('detail');
        Route::get('create',[TicketClientController::class,'create'])->name('create');
        Route::post('store',[TicketClientController::class,'store'])->name('store');
        Route::prefix('user')->name('user.')->group(function (){
            Route::post('update',[ClientClientController::class,'update'])->name('update');
        });
    });
});

Route::middleware('checkLogout')->prefix('/')->name('form.')->group(function (){
    Route::get('/login',[AuthController::class,'getLogin'])->name('getLogin');
    Route::post('/login',[AuthController::class,'postLogin'])->name('postLogin');

    Route::get('/register',[AuthController::class,'getRegister'])->name('getRegister');
    Route::post('/register',[AuthController::class,'postRegister'])->name('postRegister');
});

Route::get('/',[HomeController::class,'layout'])->name('home');

Route::get('/active-user',[AuthController::class,'activeUser'])->name('activeUser');