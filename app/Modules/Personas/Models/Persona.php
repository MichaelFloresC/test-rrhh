<?php

namespace App\Modules\Personas\Models;

use App\Modules\FormacionAcademica\Models\FormacionAcademica;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = [
        'dni',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'telefono',
        'correo_personal',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
            'activo' => 'boolean',
        ];
    }

    public function formacionesAcademicas(): HasMany
    {
        return $this->hasMany(FormacionAcademica::class);
    }
}