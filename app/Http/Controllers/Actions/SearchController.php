<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search (Request $request, $q = null)
    {
        $products = null;
        $count = 0;
        $categories = collect();
        $menus = collect();

        if(!empty($q)) {
            $products = Product::inRandomOrder()
                ->whereHas('images', function($query) { $query->where('is_main', true); })
                ->with('category')
                ->with('characteristics')
                ->groupBy('parent_vendor_code')
                ->groupBy('vendor_code')
                ->where('name', 'like', '%'.$q.'%')
                ->orWhere('vendor_code', 'like', '%'.$q.'%')
                ->orWhere('description', 'like', '%'.$q.'%');

//            $count = $products->count();
            $products = $products->get();

            foreach($products as $product) {
                if($product->category) {
                    $categories->push($product->category);
                }

                if($product->menu) {
                    $menus->push($product->menu);
                }
            }

            $categories = $categories->unique();
            $menus = $menus->unique();
        }

        $count = $products ? $products->count() : '';

        return view('partials.search_preview', compact('products', 'count', 'categories', 'menus'));
    }
}
