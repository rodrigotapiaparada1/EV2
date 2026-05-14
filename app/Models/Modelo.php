<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'marca_id', 'anio'];

    // Un modelo pertenece a una marca
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    // Un modelo tiene muchos vehículos
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
