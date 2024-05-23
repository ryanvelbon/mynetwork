<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        $countries = [76, 83, 108, 235];

        return [
            'name' => fake()->firstName() . ' ' . fake()->lastName(),
            'category_id' => \App\Models\Category::inRandomOrder()->first(),
            'country_id' => $countries[array_rand($countries)],
            'city_id' => rand(1,3),
            'sex' => rand(1,10) > 5 ? 'm' : 'f',
            'dob' => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'religion_id' => \App\Models\Religion::inRandomOrder()->first(),
        ];
    }
}
