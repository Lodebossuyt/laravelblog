<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name' => 'politiek','slug'=>Str::slug('politiek', '-')]);
        DB::table('categories')->insert(['name' => 'nieuws','slug'=>Str::slug('nieuws', '-')]);
        DB::table('categories')->insert(['name' => 'sport','slug'=>Str::slug('sport', '-')]);

        $categories = Category::all();
        Post::all()->each(function($post) use ($categories){
            $post->categories()->attach(
                $categories->random(rand(1,$categories->count()))->pluck('id')->toArray()
            );
        });
    }
}
