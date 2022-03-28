<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call([RolesTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([UsersRolesTableSeeder::class]);
        $this->call([PostTableSeeder::class]);
        $this->call([CategoriesTableSeeder::class]);
        $this->call([RepliesTableSeeder::class]);
        $this->call([TagsTableSeeder::class]);
        /*$this->call([PostsCategoriesTableSeeder::class]);*/
    }
}
