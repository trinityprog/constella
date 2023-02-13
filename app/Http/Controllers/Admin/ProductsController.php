<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Exports\ProductExportThousand;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->with('currency')
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('vendor_code', 'like', '%' . $request->search . '%')
                    ->orWhere('parent_vendor_code', 'like', '%' . $request->search . '%')
            )
            ->latest()
            ->paginate(10);

        $currencies = Currency::query()->where('code', '!=', 'KZT')->latest('value')->get();

        return view('admin.products.index', compact('products', 'currencies'));

    }

    public function create ()
    {
        return view('admin.products.create');
    }

    public function edit ($id) {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'description' => 'required|string',
            'description_right' => 'required|string'
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return back()->with('flash_message', 'Описание успешно обновлено!');
    }

    public function show()
    {

    }

    public function export(Request $request)
    {
        $products = Product::query()
            ->with('currency')
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->where('name', 'like', '%' . $request->search . '%')
            )
            ->latest()
            ->get();


        return Excel::download(new ProductExport($products), 'productsExport-from-' . now() . '.xlsx');
    }

    public function exportThousand(Request $request)
    {
        $products = Product::query()
            ->with('currency', 'images')
            ->whereHas('images')
            ->latest()
            ->get()
            ->map(function($item) {
                $item['price_kzt'] = CartService::formatCurrency($item->price, true, $item->currency_id, 'KZT');
                $item['price_usd'] = CartService::formatCurrency($item->price, true, $item->currency_id, 'USD');
                return $item;
            })->whereBetween('price', [0, 1000]);


        return Excel::download(new ProductExportThousand($products), 'productsExportThousand-from-' . now() . '.xlsx');
    }
}
