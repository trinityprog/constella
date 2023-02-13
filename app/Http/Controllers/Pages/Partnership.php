<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Partnership extends Controller
{
    public function press () {
        return view('pages.partnership.press');
    }

    public function sponsors () {
        return view('pages.partnership.sponsors');
    }

    public function partners () {
        return view('pages.partnership.partners');
    }

    public function agents ()
    {
        return redirect()->away('https://agents.zhannakangroup.com');
    }
}
