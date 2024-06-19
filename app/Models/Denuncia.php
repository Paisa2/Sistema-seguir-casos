<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;
    protected $table = 'denuncias';
    protected $fillable = ['unidad_id', 'caso_id', 'fecha_registro', 'descripcion' ];

    public function unidad() {
        return $this->belongsTo(Unidad::class);
    }

    public function caso() {
        return $this->belongsTo(Caso::class);
    }
}
