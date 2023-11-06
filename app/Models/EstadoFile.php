<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoFile extends Model
{
    use HasFactory;
    protected $table = 'estados_files';
    protected $fillable = [
        'nombre',
    ];
}
