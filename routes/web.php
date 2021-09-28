<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\CurrentUserController;
use App\Http\Controllers\Management\PositionController;
use App\Http\Controllers\Management\DepartmentController;
use App\Http\Controllers\Management\UserController;

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'profile'], function() {
        Route::delete('delete', [CurrentUserController::class, 'destroy'])
        ->name('current-user.destroy');
        Route::get('', [CurrentUserController::class, 'show'])
        ->name('profile');
    });

    Route::group(['middleware' => 'manager'], function () {
        Route::group(['prefix' => 'management'], function() {
            Route::resource('position', PositionController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('department', DepartmentController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('user', UserController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
        });
    });
});

require __DIR__.'/auth.php';
