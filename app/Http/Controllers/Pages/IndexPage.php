<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Services\IndexPageService;
use Illuminate\Support\Facades\Cookie;

class IndexPage extends Controller
{
    public function index ($category = 'female')
    {
        $data = (new IndexPageService())->get($category);
        Cookie::queue('sex', $category, time() + 60 * 4, null, null, false, false);
        session()->put('sex', $category);
        return view('pages.index', compact('data'));
    }

    public function fourProductsBrand ($brand = 'Damiani', IndexPageService $indexPageService)
    {
        return $indexPageService->getFourProductsBrand($brand);
    }
}
