<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['vehiculo_id', 'cliente_id', 'fecha', 'total'];

    // Una venta pertenece a un vehículo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    // Una venta pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}