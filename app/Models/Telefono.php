<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    protected $table = "telefonos";

    protected $connection = 'mysql2';

    protected $primary_key = 'telefono_id';

    const CREATED_AT = 'registrado';
    const UPDATED_AT = 'modificado';

    protected $fillable = [
        'telefono_id',
        'usuario_id',
        'numero',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
