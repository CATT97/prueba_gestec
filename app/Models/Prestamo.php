<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    public function Libro()
    {
        return $this->belongsTo(Libros::class);
    }

    public function Estudiante()
    {
        return $this->belongsTo(Estudiantes::class);
    }
}
