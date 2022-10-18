<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
//	config(['app.locale' => 'id']);
//	Carbon\Carbon::setLocale('id');
//	date_default_timezone_set('Asia/Jakarta');
     }
}
