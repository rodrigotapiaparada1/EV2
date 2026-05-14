<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = ['modelo_id', 'color', 'precio', 'stock'];

    // Un vehículo pertenece a un modelo
    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    // Un vehículo puede estar asociado a muchas ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
