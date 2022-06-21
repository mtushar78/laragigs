<?php

namespace Database\Seeders;

use App\Models\Listings;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        Listings::factory(6)->create();
//        listings::create(
//            [
//                'title' => 'Laravel Senior Developer',
//                'tags' => 'laravel, javascript',
//                'company' => 'Acme Corp',
//                'location' => 'Boston, MA',
//                'email' => 'email1@email.com',
//                'website' => 'https://www.acme.com',
//                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
//            ]
//        );
//        listings::create(
//            [
//                'title' => 'Backend Developer',
//                'tags' => 'laravel, php, api',
//                'company' => 'Skynet Systems',
//                'location' => 'Newark, NJ',
//                'email' => 'email4@email.com',
//                'website' => 'https://www.skynet.com',
//                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
//            ]
//        );
    }
}
