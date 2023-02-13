<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'categories';

    protected $guarded = [];

    public function sluggable() : array
    {
        return ['slug' => ['source' => 'name']];
    }

    public function secondCategories()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    public function secondCategoriesWithProducts() : Collection
    {
        return Category::where('parent', $this->id)->whereHas('products')->get();
    }

    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function products () : HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function productsFromSub () : HasMany
    {
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }

    public function parent () : Category
    {
        return Category::find($this->parent);
    }

    public function menu () : HasMany
    {
        return $this->hasMany(Menu::class);
    }

    public function brands ()
    {
        $filterBlocks = FilterBlock::select('value')->where('filter_id', 4)->groupBy('value')->get()->pluck('value');
        return $filterBlocks;
    }

    public function getName () {
        $lg = app()->getLocale();

        if($lg === 'kz' && !empty($this->name_kz)) {
            return $this->name_kz;
        }elseif($lg === 'en' && !empty($this->name_en)) {
            return $this->name_en;
        }else {
            return $this->name;
        }
    }
}
