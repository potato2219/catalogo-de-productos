<?php

use App\Models\Product;
use Database\Seeders\ProductSeeder;

beforeEach(function () {
    $this->seed(ProductSeeder::class);
});

test('home page loads successfully with 200 status', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertViewIs('home')
        ->assertViewHas('products')
        ->assertViewHas('categories');
});

test('home page renders products passed from controller using blade', function () {
    $firstProduct = Product::first();

    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee($firstProduct->name)
        ->assertSee($firstProduct->formatted_price)
        ->assertSee($firstProduct->brand);
});

test('home page can filter products by category', function () {
    $response = $this->get(route('home', ['category' => 'Tarjetas Gráficas']));

    $response->assertOk();

    $graphicCards = Product::where('category', 'Tarjetas Gráficas')->get();
    foreach ($graphicCards as $gpu) {
        $response->assertSee($gpu->name);
    }
});

test('home page can search products by keyword', function () {
    $response = $this->get(route('home', ['search' => 'Ryzen']));

    $response->assertOk()
        ->assertSee('Ryzen')
        ->assertDontSee('Lian Li O11');
});

test('home page displays empty state when search finds nothing', function () {
    $response = $this->get(route('home', ['search' => 'ComponenteInexistente12345']));

    $response->assertOk()
        ->assertSee('No encontramos piezas con estos filtros');
});
