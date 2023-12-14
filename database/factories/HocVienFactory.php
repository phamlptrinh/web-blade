<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HocVienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'sdt' => fake()->phoneNumber,
            'ngay_sinh' => fake()->dateTime(),
        ];
    }
}
