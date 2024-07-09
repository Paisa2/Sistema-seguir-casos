<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;
    protected $table = 'casos';
    protected $fillable = [
        'numero_caso',
        'tipologia_caso',
        'responsable_caso',
        'etapa_caso',
        'fecha_registro',
        'derivar_casos',
        'image',
        'denunciante_nombre',
        'denunciante_apellido',
        'denunciante_ci',
        'denunciante_sexo',
        'denunciante_edad',
        'denunciante_ocupacion',
        'denunciante_estado_civil',
        'denunciante_telefono',
        'denunciado_nombre',
        'denunciado_apellido',
        'denunciado_ci',
        'denunciado_sexo',
        'denunciado_edad',
        'denunciado_telefono',
        'unidad'
    ];

    public function denuncias()
    {
        return $this->hasMany(Denuncia::class);
    }

    public function unidaditem()
    {
        return $this->belongsTo(Unidad::class, 'unidad');
    }
}
