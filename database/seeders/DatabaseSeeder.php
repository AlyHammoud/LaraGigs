<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // run sail artisan db:seed
        // check factoroy folder for user factory
        //sail artisan migrate:refresh --seed // this will empty all records in db then run seed

        Listing::factory(6)->create();

        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        listing::create([
//            'title' => 'title 1',
//            'tags' => 'tags 1',
//            'company' => 'company 1',
//            'location' => 'location 1',
//            'email' => 'email 1',
//            'website' => 'website 1',
//            'description' => 'description 1description 1description 1description 1
//            description 1description 1description 1description 1',
//        ]);
//
//        listing::create([
//            'title' => 'title 2',
//            'tags' => 'tags 2',
//            'company' => 'company 2',
//            'location' => 'location 2',
//            'email' => 'email 2',
//            'website' => 'website 2',
//            'description' => 'description 2description 1description 1description 1
//            description 1description 1description 1description 1',
//        ]);

    }
}
