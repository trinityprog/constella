<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function checkProductRelated($product, $promocode, $expired = true)
    {
        $promocodeModel = Promocode::query()->where('code', $promocode)->first();
        $productRelated = false;

        if(! Promocode::checkPromocodeIsValid($promocode, $expired)) return false;
        if(! $promocodeModel) return false;

        switch ($promocodeModel->pack->relation->type) {
            case 'sex':
                $productRelated = $promocodeModel->pack->relation->name == $product->getCharacteristic('sex');
                break;
            case 'category':
                $categories = [
                    $product->category->name,
                    $product->subcategory->name,
                    $product->menu->name,
                ];
                $productRelated = in_array($promocodeModel->pack->relation->name, $categories);
                break;
            case 'brand':
                $productRelated = $promocodeModel->pack->relation->name == $product->getCharacteristic('brand');
                break;
            case 'collection':
                $productRelated = $promocodeModel->pack->relation->name == $product->getCharacteristic('collection');
                break;
            default:
                    $productRelated = true;
                break;
        }

        if(! $productRelated) return false;

        return true;
    }

    public static function checkPromocodeIsValid($code, $expired = true)
    {
        $promocode = Promocode::query()->where('code', $code)->whereHas('pack', fn($q) => $q->where('status', 1))->first();

        if(! $promocode) return false;
        if($promocode->pack->type == 'one' && $expired && ($promocode->pack->expirationStart->isFuture() && $promocode->pack->expirationEnd->isPast())) return false;
        if($promocode->pack->type == 'more' && $expired && count($promocode->orders)) return false;

        return true;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'promocode_id');
    }

    public function pack()
    {
        return $this->belongsTo(PackPromocode::class, 'pack_id');
    }
}
