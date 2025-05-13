<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'featured',
        'is_featured',
        'quantity',
        'image',
        'images',
        'category_id',
        'brand_id',
        'status',
        'views'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'featured' => 'boolean',
        'views' => 'integer'
    ];

    public function getDiscountPercentageAttribute()
    {
        if ($this->sale_price && $this->regular_price) {
            $discount = (($this->regular_price - $this->sale_price) / $this->regular_price) * 100;
            return round($discount);
        }
        return 0;
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function inventoryTransactions()
    {
        return $this->hasMany(InventoryTransaction::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
