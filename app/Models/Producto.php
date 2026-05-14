<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock'
    ];

    // Un producto pertenece a una marca
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
