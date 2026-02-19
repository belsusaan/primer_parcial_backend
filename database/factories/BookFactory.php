<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalCopies = $this->faker->numberBetween(1, 10);
        $availableCopies = $this->faker->numberBetween(0, $totalCopies);

        return [
            'title' => $this->faker->sentence(3, true),
            'description' => $this->faker->paragraph(2),
            'isbn' => $this->faker->unique()->numerify('978#########'),
            'total_copies' => $totalCopies,
            'available_copies' => $availableCopies,
            'status' => $availableCopies > 0,
        ];
    }
}
