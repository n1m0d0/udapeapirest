<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "Usuarios";

    protected $connection = 'mysql2';

    protected $primary_key = 'usuario_id';

    const CREATED_AT = 'registrado';
    const UPDATED_AT = 'modificado';

    protected $fillable = [
        'usuario_id',
        'nombres',
        'paterno',
        'materno',
        'correo',
        'clave',
        'estado'
    ];

    public function telefonos()
    {
        return $this->HasMany(Telefono::class, 'usuario_id');
    }
}
