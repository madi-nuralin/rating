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
        'appName' => config('app.name', 'Application'),
        'organization' => [
            'name' => env('ORGANIZATION_NAME', 'Organization name'),
            'email' => env('ORGANIZATION_EMAIL', 'Email'),
            'address' => env('ORGANIZATION_ADDRESS', 'Address'),
            'url' => env('ORGANIZATION_URL', '.')
        ]
    ]);
});

Route::get('user-manual', function () {
    return Inertia::render('UserManual', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('user-manual');

use App\Http\Controllers\Profile\ProfileInformationController;
use App\Http\Controllers\Profile\ProfilePhotoController;
use App\Http\Controllers\Profile\CurrentUserController;
use App\Http\Controllers\Profile\PasswordController;
use App\Http\Controllers\Profile\UserProfileController;
//use App\Http\Controllers\Profile\OtherBrowserSessionsController;

use App\Http\Controllers\Management\PositionController;
use App\Http\Controllers\Management\DepartmentController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\Management\RoleController;
use App\Http\Controllers\Management\EmployementController;
use App\Http\Controllers\Management\RatingController;
use App\Http\Controllers\Management\RatingVerifierController;
use App\Http\Controllers\Management\RatingParameterController;
use App\Http\Controllers\Management\RatingApproverController;
use App\Http\Controllers\Management\ParameterController;

use App\Http\Controllers\Forms\FormController;
use App\Http\Controllers\Forms\FormFieldController;
use App\Http\Controllers\Forms\FormFieldOptionController;

use App\Http\Controllers\Dashboard\SubmissionController;
use App\Http\Controllers\Dashboard\VerificationController;
use App\Http\Controllers\Dashboard\ApprovementController;

use App\Http\Controllers\OAuth\SocialiteController;

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('dashboard', function () {
        return redirect()->route('feed');
    })->name('dashboard');

    Route::get('dashboard/feed', [\App\Http\Controllers\Dashboard\FeedController::class, 'index'])
        ->name('feed');

    Route::get('dashboard/verifier', [\App\Http\Controllers\Dashboard\VerifierController::class, 'get'])
        ->name('dashboard-verifier')
        ->middleware('verifier');

    Route::get('dashboard/approver', [\App\Http\Controllers\Dashboard\ApproverController::class, 'index'])
        ->name('dashboard-approver')
        ->middleware('approver');

    Route::group(['prefix' => 'dashboard'], function() {
        Route::resource('submission', SubmissionController::class,
            ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
        Route::resource('verification', VerificationController::class,
            ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']])
                ->middleware('verifier');
        Route::resource('approvement', ApprovementController::class,
            ['only' => ['index', 'create', 'show']])
                ->middleware('approver');

        Route::delete('submission-file', [SubmissionController::class, 'destroyFile'])
            ->name('submission-file.destroy');
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
        /*Route::delete('other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])
            ->name('other-browser-sessions.destroy');*/
    });

    Route::group(['middleware' => 'manager'], function () {
        Route::group(['prefix' => 'management'], function() {
            Route::resource('position', PositionController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('department', DepartmentController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('user', UserController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
                Route::get('user/{id}/login-as', [UserController::class, 'loginAs'])
                    ->name('user.login-as');
            Route::resource('role', RoleController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('employement', EmployementController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('rating', RatingController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::group(['prefix' => 'rating'], function() {
                Route::resource('{rating}/verifier', RatingVerifierController::class, [
                        'as' => 'rating',
                        'only' => ['create', 'store', 'show', 'update', 'destroy']
                    ]
                );
                Route::resource('{rating}/parameter', RatingParameterController::class, [
                        'as' => 'rating',
                        'only' => ['create', 'store', 'show', 'update', 'destroy']
                    ]
                );
                Route::resource('{rating}/approver', RatingApproverController::class, [
                        'as' => 'rating',
                        'only' => ['create', 'store', 'show', 'update', 'destroy']
                    ]
                );
            });
            Route::resource('parameter', ParameterController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            
            Route::group(['prefix' => 'parameter'], function() {
                Route::get('form/create', [ParameterController::class, 'formCreate'])
                    ->name('parameter-form.create');
                Route::post('form', [ParameterController::class, 'formStore'])
                    ->name('parameter-form.store');
                Route::put('form/{form}', [ParameterController::class, 'formDelete'])
                    ->name('parameter-form.delete');
            });

            Route::resource('form', FormController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('form-field', FormFieldController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('form-field-option', FormFieldOptionController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::put('form/{form}/scoring', [FormController::class, 'updateScoring'])
                    ->name('form.updateScoring');
        });
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::group(['prefix' => 'administration'], function() {

        });
    });
});

/*
|--------------------------------------------------------------------------
| OAuth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])
        ->name('auth.redirect');

    Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])
        ->name('auth.callback');
});

require __DIR__.'/auth.php';
