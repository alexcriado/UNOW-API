<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;

class Productos extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'descripcion', 'precio', 'cantidad', 'categoria_id'];

    /**
     * Define la relación de pertenencia a una categoría.
     */
    public function categorias()
    {
        return $this->belongsTo(Categorias::class);
    }
}

