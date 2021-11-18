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

use App\Http\Controllers\Profile\ProfileInformationController;
use App\Http\Controllers\Profile\ProfilePhotoController;
use App\Http\Controllers\Profile\CurrentUserController;
use App\Http\Controllers\Profile\PasswordController;
use App\Http\Controllers\Profile\UserProfileController;
use App\Http\Controllers\Profile\OtherBrowserSessionsController;

use App\Http\Controllers\Management\PositionController;
use App\Http\Controllers\Management\DepartmentController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\Management\AssessmentController;
use App\Http\Controllers\Management\ParameterController;

use App\Http\Controllers\Forms\FormController;
use App\Http\Controllers\Forms\FormFieldController;
use App\Http\Controllers\Forms\FormFieldOptionController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AssignmentController;
use App\Http\Controllers\Dashboard\ConfirmationController;
use App\Http\Controllers\Dashboard\ActivityController;

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::group(['prefix' => 'dashboard'], function() {

        Route::get('', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('assignment', AssignmentController::class,
                ['only' => ['index', 'show']]);
        
        Route::resource('activity', ActivityController::class,
                ['only' => ['index', 'create', 'edit', 'store', 'show', 'update', 'destroy']]);

        Route::group(['middleware' => 'confirmer'], function () {
            Route::resource('confirmation', ConfirmationController::class,
                ['only' => ['index', 'show', 'update']]);
        });
    });

    Route::group(['prefix' => 'user'], function() {
        Route::delete('', [CurrentUserController::class, 'destroy'])
            ->name('current-user.destroy');
        Route::get('profile', [UserProfileController::class, 'show'])
            ->name('profile.show');
        Route::put('password', [PasswordController::class, 'update'])
            ->name('user-password.update');
        Route::put('information', [ProfileInformationController::class, 'update'])
            ->name('user-profile-information.update');
        Route::delete('profile-photo', [ProfilePhotoController::class, 'destroy'])
            ->name('current-user-photo.destroy');
        Route::delete('other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])
            ->name('other-browser-sessions.destroy');
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

            Route::group(['prefix' => 'parameter-form'], function() {
                Route::resource('form', FormController::class,
                    ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
                Route::resource('form-field', FormFieldController::class,
                    ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
                Route::resource('form-field-option', FormFieldOptionController::class,
                    ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            });
        });
    });
});

require __DIR__.'/auth.php';
