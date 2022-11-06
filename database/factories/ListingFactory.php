<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_name' => $this->faker->sentence(),
            'website' => $this->faker->url(),
            'developer' => $this->faker->name(),
            'email' => $this->faker->companyEmail(),
            'telephone' => $this->faker->phoneNumber(),
            'tags' => 'laravel,Tailwind,Vue',
            'description' => $this->faker->paragraph(5),
        ];
    }
}
