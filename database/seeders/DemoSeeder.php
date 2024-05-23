<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\Hobby;
use App\Models\Religion;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ]);

        $cities = [
            ['title' => 'Istanbul', 'country_id' => 228],
            ['title' => 'Da Nang', 'country_id' => 243],
            ['title' => 'Bali', 'country_id' => 103],
            ['title' => 'Malta', 'country_id' => 134],
            ['title' => 'Barcelona', 'country_id' => 209],
            ['title' => 'Kuala Lumpur', 'country_id' => 131],
            ['title' => 'Penang', 'country_id' => 131],
        ];

        City::insert($cities);

        $categories = [
            ['title' => 'Business'],
            ['title' => 'Developer'],
            ['title' => 'Marketing'],
            ['title' => 'UI UX Design'],
        ];

        Category::insert($categories);

        $religions = [
            ['title' => 'Buddhist'],
            ['title' => 'Christian'],
            ['title' => 'Hindu'],
            ['title' => 'Muslim'],
        ];

        Religion::insert($religions);

        $skills = [
            'Angular', 'React', 'React Native', 'Vue',
            'Laravel', 'Node', 'Ruby on Rails',
            'Shopify', 'WooCommerce', 'WordPress'
        ];

        foreach ($skills as $title) {
            Skill::create(['title' => $title]);
        }

        $hobbies = [
            'chess', 'Warcraft 3', 'Counter Strike',
            'football', 'basketball',
            'bass', 'guitar', 'drums', 'piano', 'DJ', 'music production',
            'photography', 'videography',
            'travel', 'digital nomad',
        ];

        foreach ($hobbies as $title) {
            Hobby::create(['title' => $title]);
        }

        Contact::factory(50)->create();
    }
}
