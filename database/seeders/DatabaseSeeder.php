<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Categorias;
use App\Models\Productos;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // Crear dos categorías
        $category1 = Categorias::create([
            'nombre' => 'Electrónicos',
            'descripcion' => 'Productos electrónicos de última generación',
        ]);

        $category2 = Categorias::create([
            'nombre' => 'Ropa',
            'descripcion' => 'Ropa de moda para todas las edades',
        ]);

        // Crear un par de productos asociados a las categorías creadas
        $product1 = Productos::create([
            'nombre' => 'Teléfono móvil',
            'descripcion' => 'Teléfono móvil de alta gama',
            'precio' => 599.99,
            'cantidad' => 100,
            'categoria_id' => $category1->id,
        ]);

        $product2 = Productos::create([
            'nombre' => 'Camiseta',
            'descripcion' => 'Camiseta de algodón suave y cómoda',
            'precio' => 29.99,
            'cantidad' => 50,
            'categoria_id' => $category2->id,
        ]);
    }
}
