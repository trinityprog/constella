<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Services\CatalogPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ZhannasChoice extends Controller
{
    public function index (CatalogPageService $catalogPageService)
    {
        $products = \App\Models\ZhannasChoice::query()
            ->with(['product', 'category'])
            ->whereHas('product')->get();

        $data['choice'] = $catalogPageService->bestProducts();

        return view('pages.zhanna', compact('products', 'data'));
    }
}
