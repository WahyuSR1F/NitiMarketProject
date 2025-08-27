<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    protected $model = \App\Models\Product::class;
    
    public function definition(): array
    {
        $kategoriId = \App\Models\Kategori::inRandomOrder()->value('id');;


        $name = $this->faker->words(2, true);
        return [
            'id' => Str::uuid(),
            'nama' => ucfirst($name),
            'deskripsi' => $this->faker->sentence(),
            'kategori_id' => $kategoriId,
            'asal' => $this->faker->city(),
            'harga' => (string) $this->faker->numberBetween(10000, 500000),
            'product_by' => $this->faker->company(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
