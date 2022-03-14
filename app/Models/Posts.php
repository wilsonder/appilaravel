<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;


    // Obtengo el id de la categoria

    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }
}
