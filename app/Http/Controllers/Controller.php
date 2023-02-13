<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $lgUser = explode(';', request()->server('HTTP_ACCEPT_LANGUAGE'));

        if(!empty($lgUser[0])) {
            $lgs = explode(',', $lgUser[0]);

            if (!Cookie::has('language')){
                if(in_array('kz', $lgs)) {
                    Cookie::queue('language', 'kz', time() + 60 * 60 * 24 * 365, null, null, false, false);
                    app()->setLocale('kz');
                    return;
                }

                if(in_array('ru', $lgs)) {
                    Cookie::queue('language', 'ru', time() + 60 * 60 * 24 * 365, null, null, false, false);
                    app()->setLocale('ru');
                    return;
                }

                if(in_array('en', $lgs)) {
                    Cookie::queue('language', 'en', time() + 60 * 60 * 24 * 365, null, null, false, false);
                    app()->setLocale('en');
                    return;
                }

                Cookie::queue('language', 'ru', time() + 60 * 60 * 24 * 365, null, null, false, false);
                app()->setLocale('ru');
            }
        }
    }
}
