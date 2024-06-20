<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadDefensoria extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'unidades_defensorias';
    protected $fillable = ['nombre', 'derivar_unidad' ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
