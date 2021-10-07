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
use App\Http\Controllers\Profile\PasswordController;

use App\Http\Controllers\Management\PositionController;
use App\Http\Controllers\Management\DepartmentController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\Management\AssessmentController;
use App\Http\Controllers\Management\ParameterController;
use App\Http\Controllers\Management\RuleController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AssignmentController;

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('', [DashboardController::class, 'index'])
            ->name('dashboard');
        Route::resource('assignment', AssignmentController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
    });

    Route::group(['prefix' => 'profile'], function() {
        Route::delete('', [CurrentUserController::class, 'destroy'])
        ->name('current-user.destroy');
        Route::get('', [CurrentUserController::class, 'show'])
        ->name('profile');
        Route::put('password', [PasswordController::class, 'update'])
        ->name('user-password.update');
    });

    Route::group(['middleware' => 'manager'], function () {
        Route::group(['prefix' => 'management'], function() {
            Route::resource('position', PositionController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('department', DepartmentController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('user', UserController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('assessment', AssessmentController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('parameter', ParameterController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::group(['prefix' => 'parameter'], function() {
                Route::resource('rule', RuleController::class,
                    ['only' => ['create', 'store', 'show', 'update', 'destroy']]);
            });
        });
    });
});

require __DIR__.'/auth.php';
