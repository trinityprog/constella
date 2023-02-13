<?php

namespace App\Providers;

use App\Models\CustomerRequestTheme;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('partials.modals', function($view) {
            $view->with(['customer_request_themes' => CustomerRequestTheme::all(['id', 'name_ru', 'name_en', 'name_kz'])]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
