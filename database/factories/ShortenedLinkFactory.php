<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShortenedLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'short_link_id' => $this->faker->unique()->lexify('????????'),
            'full_link' => $this->faker->url(),
        ];
    }
}
