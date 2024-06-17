<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        Listing::factory(6)->create();
//        Listing::create([
//            'title' => 'Full-Stack Engineer',
//            'tags' => 'laravel, backend, api',
//            'company' => 'Stark Industries',
//            'location' => 'New York, NY',
//            'email' => 'email1@email.com',
//            'website' => 'https://www.starkindustries.com',
//            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'
//        ]);
//        Listing::create([
//            'title' => 'Full-Stack Engineer 2',
//            'tags' => 'laravel, backend, api',
//            'company' => 'Stark Industries 2',
//            'location' => 'New York, NY',
//            'email' => 'email2@email.com',
//            'website' => 'https://www.starkindustries2.com',
//            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'
//        ]);
    }
}
