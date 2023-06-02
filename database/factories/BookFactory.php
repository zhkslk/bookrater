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
        $wordsInTitle = $this->faker->numberBetween(1, 4);

        return [
            'title' => ucfirst($this->faker->words($wordsInTitle, true)),
            'description' => $this->faker->text(300),
        ];
    }
}
