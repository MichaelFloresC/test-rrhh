<?php

namespace App\Modules\FormacionAcademica\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\FormacionAcademica\Models\FormacionAcademica;
use App\Modules\FormacionAcademica\Services\FormacionAcademicaService;
use App\Modules\Personas\Models\Persona;
use Inertia\Inertia;

class FormacionAcademicaController extends Controller
{
    public function __construct(
        private readonly FormacionAcademicaService $service
    ) {}

    public function index(Persona $persona)
    {
        return Inertia::render(
            'modules/formacion-academica/index',
            [
                'persona' => $persona,

                'formaciones' =>
                    $persona->formacionesAcademicas()
                        ->orderByDesc('fecha_fin')
                        ->get()
            ]
        );
    }

    public function store(
        Persona $persona
    ) {

        $data = request()->validate([
            'nivel' => ['required'],
            'titulo' => ['required'],
            'institucion' => ['required'],
            'pais' => ['nullable'],
            'fecha_inicio' => ['nullable', 'date'],
            'fecha_fin' => ['nullable', 'date'],
            'concluido' => ['boolean'],
        ]);

        $this->service->crear([
            ...$data,
            'persona_id' => $persona->id
        ]);

        return back()->with(
            'success',
            'Formación académica registrada.'
        );
    }
}