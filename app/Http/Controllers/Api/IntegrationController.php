<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BrandDescription;
use App\Models\Category;
use App\Models\Color;
use App\Models\Currency;
use App\Models\Filter;
use App\Models\FilterBlock;
use App\Models\Leftover;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Storage;

class IntegrationController extends Controller
{
    public function __construct()
    {
        set_time_limit(0);
    }

    public function checkKey ($key) {
        if(empty($key))
            abort(500, 'Key is not specified!');

        if(strlen($key) < 20 || strlen($key) > 20)
            abort(500, 'Wrong key!');

        if($key != 'zHmR9VL58cknU2n1CUUI')
            abort(500, 'Wrong key!');
    }

    public function users (Request $request): JsonResponse
    {
        $this->checkKey($request->input('key'));

        $data = $request->except('key');

        foreach($data['data'] as $us) {
            $password = bcrypt('passwordRandomHere');

            $user = User::create([
                'name' => $us['name'],
                'email' => $us['email'],
                'sex' => $us['sex'],
                'password' => $password,
            ]);

            $user->info()->create([
                'surname' => $us['lastname'],
                'phone' => $us['phone'],
                'dob' => Carbon::parse($us['dob'])->format('Y-m-d'),
                'iin' => $us['iin'],
                'discount' => $us['discount_amount'],
                'bonuses' => $us['bonus_amount']
            ]);
        }

        return response()->json(['code' => 200, 'message' => 'Success']);
    }

    function isKeyExistsInArray ($arr, $key) {
        return array_key_exists($key, $arr) ? $arr[$key] : null;
    }

    public function products (Request $request) : JsonResponse
    {
        set_time_limit(0);

        $this->checkKey($request->input('key'));

        $data = $request->except('key');

//        log
        $json = json_encode($request->all(), JSON_UNESCAPED_UNICODE);
        $fileName = 'products-' . now() . '.json';
        Storage::disk('local')->put('integration/products/' . $fileName, $json);

        foreach($data['data'] as $product) {
            if(array_key_exists('category', $product) && array_key_exists('subcategory', $product)) {
                $currency = Currency::where('code', $product['currency'])->first();

                $priceInKzt = $product['price'] * $currency->value;

                $newProduct = Product::query()->ignoreInStock()
                    ->updateOrCreate([
                    'code' => $product['code'],
                ],[
                    'vendor_code' => $product['vendor_code'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'parent_vendor_code' => $product['parent_vendor_code'] ?? null,
//                    'description' => $product['description'] ?? null,
                    'category_id' => Category::where('code', $product['category'])->where('parent', 0)->first()->id,
                    'subcategory_id' => (isset($product['subcategory']) && !empty($product['subcategory'])) ? Category::where('code', $product['subcategory'])->where('parent', '!=', 0)->first()->id : null,
                    'organization' => $product['org'],
                    'discount' => $product['discount'],
                    'currency_id' => $currency->id ?? 1
                ]);

                $characteristics = $newProduct->characteristics()->updateOrCreate([
                    'product_type' => $this->isKeyExistsInArray($product['characteristics'], 'product_type'),
                    'brand' => $this->isKeyExistsInArray($product['characteristics'], 'brand'),
                    'nomenclature_group' => $this->isKeyExistsInArray($product['characteristics'], 'nomenclature_group'),
                ],[
                    'brand' => $this->isKeyExistsInArray($product['characteristics'], 'brand'),
                    'size' => (!empty($this->isKeyExistsInArray($product['characteristics'], 'size'))) ? str_replace('"', '', $this->isKeyExistsInArray($product['characteristics'], 'size')) : null,
                    'collection' => $this->isKeyExistsInArray($product['characteristics'], 'collection'),
                    'metal_color' => $this->isKeyExistsInArray($product['characteristics'], 'metal_color'),
                    'stones' => (!empty($this->isKeyExistsInArray($product['characteristics'], 'stones'))) ? json_encode($this->isKeyExistsInArray($product['characteristics'], 'stones')) : null,
                    'mass' => $this->isKeyExistsInArray($product['characteristics'], 'mass'),
                    'stamp' => $this->isKeyExistsInArray($product['characteristics'], 'stamp'),
                    'color' => $this->isKeyExistsInArray($product['characteristics'], 'color'),
                    'color_code' => $this->isKeyExistsInArray($product['characteristics'], 'color_code'),
                    'sex' => $this->isKeyExistsInArray($product['characteristics'], 'sex'),
                    'lining' => $this->isKeyExistsInArray($product['characteristics'], 'lining'),
                    'composition' => $this->isKeyExistsInArray($product['characteristics'], 'composition'),
                    'country_provider' => $this->isKeyExistsInArray($product['characteristics'], 'country_provider'),
                    'cloth_material' => (!empty($this->isKeyExistsInArray($product['characteristics'], 'cloth_material'))) ? json_encode($this->isKeyExistsInArray($product['characteristics'], 'cloth_material')) : null,
                    'cloth_season' => $this->isKeyExistsInArray($product['characteristics'], 'cloth_season'),
                    'product_type_multiple' => $this->isKeyExistsInArray($product['characteristics'], 'product_type_multiple'),
                    'product_type' => $this->isKeyExistsInArray($product['characteristics'], 'product_type'),
                    'nomenclature_group' => $this->isKeyExistsInArray($product['characteristics'], 'nomenclature_group'),
                ]);

                if (!empty($characteristics['color']) && !Color::where('abbr', $this->isKeyExistsInArray($product['characteristics'], 'color_code'))->exists()) {
                    Color::create([
                        'name' => $this->isKeyExistsInArray($product['characteristics'], 'color'),
                        'abbr' => $this->isKeyExistsInArray($product['characteristics'], 'color_code'),
                    ]);
                }

                if (!empty($characteristics['metal_color']) && !Color::where('abbr', $this->isKeyExistsInArray($product['characteristics'], 'metal_color'))->exists()) {
                    Color::create([
                        'name' => $this->isKeyExistsInArray($product['characteristics'], 'metal_color'),
                        'abbr' => $this->isKeyExistsInArray($product['characteristics'], 'metal_color')
                    ]);
                }

                if (!empty($characteristics['product_type_multiple']) &&
                    !Menu::where('name', $characteristics['product_type_multiple'])->exists() &&
                    !empty($newProduct->subcategory_id)
                ) {
                    $menu = Menu::create([
                        'name' => $characteristics['product_type_multiple'],
                        'category_id' => $newProduct->subcategory_id,
                    ]);
                    $newProduct->update(['menu_id' => $menu->id]);
                } elseif (!empty($characteristics['product_type_multiple']) && !empty($newProduct->subcategory_id)) {
                    $menu = Menu::where('name', $characteristics['product_type_multiple'])->first();
                    $newProduct->update(['menu_id' => $menu->id]);
                }

                if(!empty($characteristics['brand']) && !BrandDescription::where('name', $characteristics['brand'])->exists())
                {
                    BrandDescription::updateOrCreate(
                        ['name' => $characteristics['brand']],
                        ['name' => $characteristics['brand']]
                    );
                }
            }
        }

        return response()->json(['code' => 200, 'message' => 'Success']);
    }

    public function categories (Request $request): JsonResponse
    {
        $this->checkKey($request->input('key'));

        $data = $request->except('key');

        foreach($data['data'] as $category) {
            Category::updateOrCreate(
                ['code' => $category['code']],
                ['name' => $category['name'], 'parent' => $category['parent_code']]
            );
        }

        return response()->json(['status' => 200, 'message' => 'Categories successfully created / updated']);
    }

    public function currencies (Request $request) : JsonResponse
    {
        $this->checkKey($request->input('key'));

        $data = $request->except('key');

        foreach($data['data'] as $currency) {
            Currency::updateOrCreate(
                ['code' => $currency['code']],
                ['value' => doubleval($currency['value'])]
            );
        }

        return response()->json(['status' => 200, 'message' => 'Currencies successfully updated']);
    }

    public function leftovers (Request $request): JsonResponse
    {
        $this->checkKey($request->input('key'));

        $data = $request->except('key');

        abort_if(! $request->has('DbName') || ! $request->filled('DbName'), 500, 'Field "DbName" not found');
        $db_name = $request->input('DbName');

        $start = now();

//        log
        $json = json_encode($request->all(), JSON_UNESCAPED_UNICODE);
        $fileName = 'leftovers-' . now() . '.json';
        Storage::disk('local')->put('integration/leftovers/' . $fileName, $json);


        foreach($data['data'] as $leftover) {
            $product = Product::query()->ignoreInStock()
                ->where('code', $leftover['code'])->first();

            if($product) {
                Leftover::query()->updateOrCreate([
                    'code' => $leftover['code'],
                    'db_name' => $db_name,
                ], [
                    'warehouse_id' => $leftover['warehouse_id'],
                    'warehouse_name' => $leftover['warehouse_name'],
                    'warehouse_city' => $leftover['warehouse_city'],
                    'warehouse_address' => $leftover['warehouse_address'],
                    'count' => $leftover['count'],
                    'product_id' => $product->id ?? null,
                    'updated_at' => now(),
                    'status' => 1
                ]);
            }
        }

        //clean up the tails
        Leftover::query()
            ->where('db_name', $db_name)
            ->where('updated_at', '<', $start)
            ->update(['status' => 0]);

        return response()->json(['status' => 200, 'message' => 'Leftovers updated!']);
    }
}
