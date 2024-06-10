<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;

    public function unidad() {
        return $this->belongsTo(Unidad::class);
    }

    public function caso() {
        return $this->belongsTo(Caso::class);
    }
}
