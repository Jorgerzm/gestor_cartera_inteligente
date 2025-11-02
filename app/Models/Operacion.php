<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'tipo',
        'monto',
        'fecha',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
