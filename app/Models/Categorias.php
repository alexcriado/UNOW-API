<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;

class Categorias extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    /**
     * Define la relación de uno a muchos con Product.
     */
    public function productos()
    {
        return $this->hasMany(Productos::class);
    }
}
