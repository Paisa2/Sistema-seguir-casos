<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;
    protected $table = 'casos';
    protected $fillable = ['nombre', 'descripcion', 'estado' ];

    public function denuncias() {
        return $this->hasMany(Denuncia::class);
    }
}
