<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'products';

    protected $guarded = [];

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
            'vendor_slug' => [
                'source' => 'vendor_code'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();


        static::addGlobalScope('inStock', function (Builder $builder) {
            if(! request()->is('profile*')) {
                $builder->whereHas('leftover', fn($q) => $q->where('status', 1));
            }
        });
    }

    public function scopeIgnoreInStock()
    {
        return $this->newQueryWithoutScope('inStock');
    }

    public function youth()
    {
        return $this->hasMany(YouthProduct::class);
    }

    public function images () : HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category () : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory () : BelongsTo
    {
        return $this->belongsTo(Category::class, 'subcategory_id', 'id');
    }

    public function menu () : BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function poster ()
    {
        $image = $this->images->where('is_main', true)->first();
        return $image ? url('i/products/images/'. $image->name) : '';
    }

    public function poster_alt_tag ()
    {
        $image = $this->images->where('is_main', true)->first();
        return $image ? $image->alt_tag : '';
    }

    public function alt_tag ()
    {
        $image = $this->images->where('is_main', false)->first();
        return $image ? $image->alt_tag : '';
    }

    public function filter () : HasMany
    {
        return $this->hasMany(Filter::class);
    }

    public function filterBlock () : HasMany
    {
        return $this->hasMany(FilterBlock::class);
    }

    public function getBrandAttribute ()
    {
        return $this->getCharacteristic('brand');
    }

    public function getTypeAttribute ()
    {
        return $this->getCharacteristics('product_type')->first();
    }

    public function getMetalColorAttribute ()
    {
        return $this->getCharacteristics('metal_color')->first();
    }

    public function getCollectionAttribute ()
    {
        return $this->getCharacteristics('collection');
    }

    public function getSizeAttribute ()
    {
        return $this->getCharacteristics('size');
    }

    public function getMaterialAttribute ()
    {
        return $this->getCharacteristics('metal_material')->first();
    }

    public function getStonesAttribute ()
    {
        return $this->getCharacteristics('stone_type')->first();
    }

    public function getCharacteristics($characteristic)
    {
        $filter = Filter::where('type', $characteristic)->first();
        return $this->filterBlock->where('filter_id', $filter->id);
    }

    public function getColors ()
    {
        $colors = Filter::where('type', 'color')->first();
        return $this->filterBlock->where('filter_id', $colors->id);
    }

    public function getColorsMetal ()
    {
        return $this->getCharacteristic('color_Code');
    }

    public function displayName () : string
    {
        return $this->getCharacteristic('brand') . ' ' . $this->getCharacteristic('product_type');
    }

    public function displayInfo ()
    {
        return $this->getCharacteristic('collection');
    }

    public function currency () : HasOne
    {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }

    public function characteristics () : HasOne
    {
        return $this->hasOne(ProductCharacteristic::class);
    }

    public function getCharacteristic($key)
    {
        return $this->characteristics[$key] ?? null;
    }

    public function favorite (): BelongsTo
    {
        return $this->belongsTo(Favorite::class, 'id', 'product_id');
    }

    public function leftover (): HasOne
    {
        return $this->hasOne(Leftover::class);
    }

    public function getDescription () {
        $lg = app()->getLocale();

        if($lg === 'kz' && !empty($this->description_kz)) {
            return $this->description_kz;
        }elseif($lg === 'en' && !empty($this->description_en)) {
            return $this->description_en;
        }else {
            return $this->description;
        }
    }

    public function getDescriptionRight () {
        $lg = app()->getLocale();

        if($lg === 'kz' && !empty($this->description_right_kz)) {
            return $this->description_right_kz;
        }elseif($lg === 'en' && !empty($this->description_right_en)) {
            return $this->description_right_en;
        }else {
            return $this->description_right;
        }
    }

    public function getBrandLogoAttribute()
    {
        if($this->brand)
            $brandLogo = BrandDescription::where('name', $this->brand)->value('logo');
            if($brandLogo)
                return asset('i/' . $brandLogo);

        return '';
    }
}
