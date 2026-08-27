<?php

namespace App\Modules\FormacionAcademica\Models;

use App\Modules\Personas\Models\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormacionAcademica extends Model
{
    protected $table = 'formaciones_academicas';

    protected $fillable = [
        'persona_id',
        'nivel',
        'titulo',
        'institucion',
        'pais',
        'fecha_inicio',
        'fecha_fin',
        'concluido',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
            'concluido' => 'boolean',
        ];
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}