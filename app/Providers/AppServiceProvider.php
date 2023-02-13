<?php
namespace App\Providers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Type;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        if(!Cookie::has('female'))
            Cookie::queue('sex', 'female', time() + 60 * 4, null, null, false, false);

        if(!Cookie::has('currency'))
            cookie()->queue(cookie()->make('currency', 'kzt', time() + (10 * 365 * 24 * 60 * 60)));

        Blade::componentNamespace('App\\Views\\Components', 'filters');

        Paginator::useBootstrap();

        Collection::macro('recursive', function () {
            return $this->whenNotEmpty($recursive = function ($item) use (&$recursive) {
                if (is_array($item)) {
                    return $recursive(new static($item));
                }
                elseif ($item instanceof Collection) {
                    $item->transform(static function ($collection, $key) use ($recursive, $item) {
                        return $item->{$key} = $recursive($collection);
                    });
                } elseif (is_object($item)) {
                    foreach ($item as $key => &$val) {
                        $item->{$key} = $recursive($val);
                    }
                }
                return $item;
            });
        });

        \Gate::define('Admin', function ($user) {
            if ($user->role == 'admin') {
                return true;
            }
            return false;
        });

        Cache::rememberForever('currencies', function () {
            return Currency::all();
        });

        Cache::rememberForever('types', function () {
            return Type::query()->orderBy('order')->get();
        });
    }
}
