<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use DB;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user()
                    ? array_merge(
                        $request->user()->toArray(), [
                            'roles' => $request->user()->roles->map(function($role) {
                                return $role->toArray();
                            })
                        ])
                    : $request->user(),
            ],
            'locales' => config('app.locales'),
            'locale' => app()->currentLocale(),
            'flash' => [
                'banner' => session()->get('flash.banner'),
                'bannerStyle' => session()->get('flash.bannerStyle')
            ]
            //'sessions' => DB::table('sessions')->get()
        ]);
    }
}
