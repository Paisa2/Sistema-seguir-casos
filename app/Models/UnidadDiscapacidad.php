<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadDiscapacidad extends Model
{
    use HasFactory;
    protected $table = 'unidades_discapacidades';
    protected $fillable = ['nombre', 'derivar_unidad' ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
