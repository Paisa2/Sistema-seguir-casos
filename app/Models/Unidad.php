<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $table = 'unidades';
    protected $fillable = ['nombre', 'derivar_unidad' ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
