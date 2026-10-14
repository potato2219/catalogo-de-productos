<?php

use App\Models\Product;
use Database\Seeders\ProductSeeder;

test('it can create a product with factory', function () {
    $product = Product::factory()->create([
        'name' => 'NVIDIA GeForce RTX 4090 24GB',
        'price' => 1899.99,
        'original_price' => 2099.99,
        'stock' => 5,
    ]);

    expect($product->exists)->toBeTrue()
        ->and($product->name)->toBe('NVIDIA GeForce RTX 4090 24GB')
        ->and((float) $product->price)->toBe(1899.99);
});

test('it formats prices correctly with euro symbol', function () {
    $product = Product::factory()->create([
        'price' => 1249.50,
        'original_price' => 1399.00,
    ]);

    expect($product->formatted_price)->toBe('1.249,50 €')
        ->and($product->formatted_original_price)->toBe('1.399,00 €');
});

test('it calculates discount percentage accurately', function () {
    $product = Product::factory()->create([
        'price' => 800.00,
        'original_price' => 1000.00,
    ]);

    expect($product->discount_percentage)->toBe(20);
});

test('it checks stock status properly', function () {
    $inStock = Product::factory()->create(['stock' => 10]);
    $outOfStock = Product::factory()->outOfStock()->create();

    expect($inStock->in_stock)->toBeTrue()
        ->and($outOfStock->in_stock)->toBeFalse();
});

test('product seeder creates at least 12 products', function () {
    $this->seed(ProductSeeder::class);

    expect(Product::count())->toBeGreaterThanOrEqual(12);
});
