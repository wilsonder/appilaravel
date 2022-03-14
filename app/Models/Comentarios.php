<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;


    // Obtener el id del Post

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
