<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;
    protected $table = 'casos';
    protected $fillable = [
                'num_caso',
                'tipologia',
                'descripcion',
                'fecha_registro',
                'nom_demandante',
                'nom_demandado',
                'estado',
            ];

    public function denuncias() {
        return $this->hasMany(Denuncia::class);
    }

    public function unidad() {
        return $this->belongsTo(Unidad::class);
    }
}
