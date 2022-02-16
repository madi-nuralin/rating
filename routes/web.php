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
//use App\Http\Controllers\Profile\OtherBrowserSessionsController;

use App\Http\Controllers\Management\PositionController;
use App\Http\Controllers\Management\DepartmentController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\Management\EmployementController;
use App\Http\Controllers\Management\RatingController;
use App\Http\Controllers\Management\RatingVerifierController;
use App\Http\Controllers\Management\ParameterController;

use App\Http\Controllers\Forms\FormController;
use App\Http\Controllers\Forms\FormFieldController;
use App\Http\Controllers\Forms\FormFieldOptionController;

use App\Http\Controllers\Dashboard\SubmissionController;
use App\Http\Controllers\Dashboard\VerificationController;
use App\Http\Controllers\Dashboard\ApprovementController;

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('dashboard', function () {
        return redirect()->route('dashboard-user');
    })->name('dashboard');

    Route::get('dashboard/user', function () {
        $user = auth()->user();

        return Inertia::render('Dashboard/User', [
            'ratings' => $user->ratings->map(function($rating) {
                return array_merge(
                    $rating->toArray(), [
                        'verifiers' => $rating->verifiers ? $rating->verifiers->map(function($verifier) {
                            return array_merge(
                                $verifier->toArray(), [
                                    'user' => $verifier->user->toArray()
                                ]
                            );
                        }) : []
                    ]
                );
            }),
            'statistics' => [
                'total' => count($user->ratings),
                'active' => count($user->ratings)
            ]
        ]);
    })->name('dashboard-user');

    Route::get('dashboard/verifier', function () {

        $verifier = array();

        if (auth()->user()->verifiers) {
            $verifier = auth()->user()->verifiers->first();
        }

        return Inertia::render('Dashboard/Verifier', [
            'ratings' => auth()->user()->verifiers ? auth()->user()->verifiers->map(function($verifier) {
                return $verifier->rating->toArray();
            }) : [],
            'rating' => $verifier ? array_merge(
                $verifier->rating->toArray(), [
                    'verifier' => $verifier->toArray(),
                    'users' => $verifier->rating->users()->paginate(10)->through(function($user) {
                        return $user->toArray();
                    })
                ]
            ) : []
        ]);

    })->name('dashboard-verifier')->middleware('verifier');

    Route::group(['prefix' => 'dashboard'], function() {
        Route::resource('submission', SubmissionController::class,
            ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
        Route::resource('verification', VerificationController::class,
            ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']])
                ->middleware('verifier');
        Route::resource('approvement', ApprovementController::class,
            ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']])
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
            Route::resource('employement', EmployementController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::resource('rating', RatingController::class,
                ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
            Route::group(['prefix' => 'rating'], function() {
                Route::resource('verifier', RatingVerifierController::class,
                    ['only' => ['create', 'store', 'show', 'update', 'destroy']]);
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

use Laravel\Socialite\Facades\Socialite;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;

Route::get('/auth/{provider}/redirect', function ($provider) {
    
    $enabled = (
        config("services.{$provider}.client_id") and 
        config("services.{$provider}.client_secret") and 
        config("services.{$provider}.redirect")
    );
    
    if (! $enabled )
        return redirect(404);

    return Socialite::driver($provider)->redirect();
    
})->middleware('guest')->name('auth.redirect');

Route::get('/auth/{provider}/callback', function ($provider) {

    try {
        $user = Socialite::driver($provider)->user();

        $_user = \App\Models\User::firstWhere(
            ['email' => $user->getEmail()],
        );

        if (!$_user) {
            # code...
        
            $_user = \App\Models\User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make(Str::random(8)),
            ]);

            event(new Registered($_user));
        }

        auth()->login($_user);

        return redirect(RouteServiceProvider::HOME);

    } catch (Exception $e) {
        //error_log($e->getMessage());
        return redirect('/login');
    }
});

require __DIR__.'/auth.php';
