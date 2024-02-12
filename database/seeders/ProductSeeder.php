<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("productos")->insert([
            "nombre" => "Iphone 15",
            "precio" => 12.3
        ]);
        DB::table("productos")->insert([
            "nombre" => "Iphone 16",
            "precio" => 11
        ]);
        DB::table("productos")->insert([
            "nombre" => "Iphone 17",
            "precio" => 43.3
        ]);
    }
}
