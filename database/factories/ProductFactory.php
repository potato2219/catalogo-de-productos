<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Tarjetas Gráficas', 'Procesadores', 'Memoria RAM', 'Almacenamiento', 'Placas Base', 'Refrigeración', 'Fuentes de Alimentación'];
        $brands = ['ASUS', 'MSI', 'Gigabyte', 'Corsair', 'AMD', 'Intel', 'Samsung', 'NZXT'];
        $name = fake()->unique()->words(3, true).' '.fake()->randomElement(['Pro', 'Max', 'Ultra', 'Gaming', 'Elite']);
        $price = fake()->randomFloat(2, 49, 1499);
        $hasDiscount = fake()->boolean(40);
        $originalPrice = $hasDiscount ? round($price * fake()->randomFloat(2, 1.1, 1.35), 2) : null;

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(100, 999),
            'category' => fake()->randomElement($categories),
            'brand' => fake()->randomElement($brands),
            'description' => fake()->paragraph(),
            'price' => $price,
            'original_price' => $originalPrice,
            'stock' => fake()->numberBetween(0, 50),
            'rating' => fake()->randomFloat(1, 3.8, 5.0),
            'reviews_count' => fake()->numberBetween(5, 250),
            'image_url' => null,
            'badge' => $hasDiscount ? 'Oferta' : (fake()->boolean(25) ? 'Top Ventas' : null),
            'specs' => [
                'Garantía' => '3 años',
                'Disponibilidad' => 'Envío en 24h',
            ],
            'is_featured' => fake()->boolean(20),
        ];
    }

    /**
     * Indicate that the product is featured.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
            'badge' => 'Destacado',
        ]);
    }

    /**
     * Indicate that the product is out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }
}
