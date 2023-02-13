<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ZhannasLetter extends Controller
{
    public function index ()
    {
        $collection = collect();

        $zhannaProducts = Product::whereHas('images')->get();

        if($zhannaProducts->count() > 0) {
            $zhannaProducts = $zhannaProducts->random(10)->unique();
        }

        $zhannaChoice = collect();

        foreach($zhannaProducts as $p) {
            $zhannaChoice->push([
                'id' => $p->id,
                'image' => $p->poster(),
                'category' => $p->category->name,
                'title' => $p->displayName(),
                'price' => $p->price,
                'url' => route('page.product', $p->slug)
            ]);
        }

        $data['zhannaChoice'] = $zhannaChoice->toArray();

        return view('pages.zletter', compact('data'));
    }
}
