<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'category',
        'brand',
        'description',
        'price',
        'original_price',
        'stock',
        'rating',
        'reviews_count',
        'image_url',
        'badge',
        'specs',
        'is_featured',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'original_price' => 'decimal:2',
            'stock' => 'integer',
            'rating' => 'float',
            'reviews_count' => 'integer',
            'is_featured' => 'boolean',
            'specs' => 'array',
        ];
    }

    /**
     * Get formatted price with euro symbol.
     */
    public function getFormattedPriceAttribute(): string
    {
        return number_format((float) $this->price, 2, ',', '.').' €';
    }

    /**
     * Get formatted original price if available.
     */
    public function getFormattedOriginalPriceAttribute(): ?string
    {
        if (! $this->original_price) {
            return null;
        }

        return number_format((float) $this->original_price, 2, ',', '.').' €';
    }

    /**
     * Calculate discount percentage if original price exists.
     */
    public function getDiscountPercentageAttribute(): ?int
    {
        if (! $this->original_price || $this->original_price <= $this->price) {
            return null;
        }

        $saving = $this->original_price - $this->price;

        return (int) round(($saving / $this->original_price) * 100);
    }

    /**
     * Check if product is currently in stock.
     */
    public function getInStockAttribute(): bool
    {
        return $this->stock > 0;
    }
}
