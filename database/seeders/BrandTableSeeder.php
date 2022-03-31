<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert(['name'=>'adidas', 'description'=>'description adidas']);
        DB::table('brands')->insert(['name'=>'nike', 'description'=>'description nike']);
        DB::table('brands')->insert(['name'=>'lacoste', 'description'=>'description lacoste']);
    }
}
