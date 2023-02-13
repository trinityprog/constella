<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PackPromocodeExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Menu;
use App\Models\PackPromocode;
use App\Models\ProductCharacteristic;
use App\Models\Promocode;
use App\Models\SectionCollections;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class PackPromocodeController extends Controller
{
    public function index()
    {
        $pack_promocodes = PackPromocode::query()
            ->latest()
            ->paginate(15);


        return view('admin.promocodes.index', compact('pack_promocodes'));
    }

    public function loadData()
    {
        $currencies = Currency::query()->get();

        $relationTypes = [
            'all' => 'Любой',
            'sex' => 'Пол',
            'category' => 'Категория',
            'brand' => 'Бренд',
            'collection' => 'Коллекция'
        ];

        $sex = ['Женский', 'Мужской', 'Детский'];

        $categories = Category::query()->get('name')->unique('name')->pluck('name')->toArray();
        $menu = Menu::query()->get('name')->unique('name')->pluck('name')->toArray();
        $category = $categories + $menu;

        $brand = ProductCharacteristic::query()->whereNotNull('brand')->get('brand')->unique('brand')->pluck('brand')->toArray();

        $collection = ProductCharacteristic::query()->whereNotNull('collection')->get('collection')->unique('collection')->pluck('collection')->toArray();

        return compact('currencies', 'relationTypes', 'sex', 'category', 'brand', 'collection');
    }

    public function create()
    {
        return view('admin.promocodes.create', $this->loadData());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:pack_promocodes,name',
            'type' => 'required|in:one,more',
            'quantity' => 'integer|required|min:1',
            'promocode' => 'required_if:type,one|max:20|unique:promocodes,code',
            'expiration.start' => 'required_if:type,one',
            'expiration.end' => 'required_if:type,one',
            'discount.type' => 'required|in:percent,price',
            'discount.percent' => 'numeric|required|min:1|max:99',
            'discount.price' => 'numeric|required|min:1',
            'discount.currency_id' => 'required_if:discount.type,price|exists:currencies,id',
            'relation.type' => 'required|in:all,sex,category,brand,collection',
            'relation.sex' => 'required_if:relation.type,sex',
            'relation.category' => 'required_if:relation.type,category',
            'relation.brand' => 'required_if:relation.type,brand',
            'relation.collection' => 'required_if:relation.type,collection',
        ]);

        $promocode = '';
        if($data['type'] == 'one') {
            $promocode = $data['promocode'];
            $data['expiration']['start'] = Carbon::parse($data['expiration']['start'])->toDateString();
            $data['expiration']['end'] = Carbon::parse($data['expiration']['end'])->toDateString();
        }
        unset($data['promocode']);

        if($data['discount']['type'] == 'percent') {
            unset($data['discount']['price']);
            unset($data['discount']['currency_id']);
        } else {
            unset($data['discount']['percent']);
        }

        $relation = $data['relation'];
        $data['relation'] = [];

        if($relation['type'] == 'all') {
            $data['relation'] = ['type' => $relation['type']];
        } else {
            $data['relation'] = ['type' => $relation['type'], 'name' => $relation[$relation['type']]];
        }

        $pack_promocode = PackPromocode::query()
            ->create($data);

        if($promocode) $pack_promocode->promocodes()->create(['code' => $promocode]);

        return redirect()->route('admin.promocodes.index')->with('flash_message', $pack_promocode->name . ' добавлены!');
    }

    public function edit($id)
    {
        $pack_promocode = PackPromocode::query()->findOrFail($id);

        return view('admin.promocodes.edit', $this->loadData() + compact('pack_promocode'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required|in:one,more',
            'quantity' => 'integer|required|min:1',
            'promocode' => 'required_if:type,one|regex:/^[A-Z0-9]+$/|min:3|max:20|unique:promocodes,code',
            'expiration.start' => 'required_if:type,one',
            'expiration.end' => 'required_if:type,one',
            'discount.type' => 'required|in:percent,price',
            'discount.percent' => 'numeric|required|min:1|max:99',
            'discount.price' => 'numeric|required|min:1',
            'discount.currency_id' => 'required_if:discount.type,price|exists:currencies,id',
            'relation.type' => 'required|in:all,sex,category,brand,collection',
            'relation.sex' => 'required_if:relation.type,sex',
            'relation.category' => 'required_if:relation.type,category',
            'relation.brand' => 'required_if:relation.type,brand',
            'relation.collection' => 'required_if:relation.type,collection',
        ]);

        $promocode = '';
        if($data['type'] == 'one') {
            $promocode = $data['promocode'];
            $data['expiration']['start'] = Carbon::parse($data['expiration']['start'])->toDateString();
            $data['expiration']['end'] = Carbon::parse($data['expiration']['end'])->toDateString();
        }
        unset($data['promocode']);

        if($data['discount']['type'] == 'percent') {
            unset($data['discount']['price']);
            unset($data['discount']['currency_id']);
        } else {
            unset($data['discount']['percent']);
        }

        $relation = $data['relation'];
        $data['relation'] = [];

        if($relation['type'] == 'all') {
            $data['relation'] = ['type' => $relation['type']];
        } else {
            $data['relation'] = ['type' => $relation['type'], 'name' => $relation[$relation['type']]];
        }

        $pack_promocode = PackPromocode::query()->findOrFail($id);

        $pack_promocode
            ->update($data);

        if($promocode) $pack_promocode->promocodes()->first()->update(['code' => $promocode]);

        return redirect()->route('admin.promocodes.index')->with('flash_message', $pack_promocode->name . ' изменены!');
    }

    public function destroy($id)
    {
        $pack_promocode = PackPromocode::query()->findOrFail($id);
        $pack_promocode->delete();
        return back()->with('flash_message', $pack_promocode->name . ' удалены!');
    }

    public function show($id)
    {
        $promocodes = Promocode::query()
            ->with('pack')
            ->whereHas('pack', fn($q) => $q->where('id', $id))
            ->paginate(100);

        $pack_promocodes_name = $promocodes->pluck('pack.name')->unique('pack.name')->first();

        return view('admin.promocodes.show', compact('promocodes', 'pack_promocodes_name'));
    }

    public function generate($id)
    {
        $pack_promocode = PackPromocode::query()->findOrFail($id);
        $pack_promocode->update(['status' => 1]);
        return back()->with('flash_message', $pack_promocode->name . ' промокоды создаются!');
    }

    public function export($id)
    {
        $promocodes = Promocode::query()
            ->with('pack')
            ->whereHas('pack', fn($q) => $q->where('id', $id))
            ->get();

        $pack_promocodes_name = $promocodes->pluck('pack.name')->unique('pack.name')->first();

        return Excel::download(new PackPromocodeExport($promocodes), $pack_promocodes_name . '.xlsx');
    }
}
