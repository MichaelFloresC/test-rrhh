<?php

namespace App\Modules\Personas\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Personas\Http\Requests\StorePersonaRequest;
use App\Modules\Personas\Models\Persona;
use App\Modules\Personas\Services\PersonaService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PersonaController extends Controller
{
    public function __construct(
        private readonly PersonaService $personaService
    ) {}

    public function index(Request $request): Response
    {
        return Inertia::render(
            'modules/personas/index',
            [
                'personas' => $this->personaService->listar(
                    $request->string('buscar')->toString()
                ),

                'filtros' => [
                    'buscar' => $request->get('buscar')
                ]
            ]
        );
    }

    public function create(): Response
    {
        return Inertia::render(
            'modules/personas/create'
        );
    }

    public function store(StorePersonaRequest $request)
    {
        $this->personaService->crear(
            $request->validated()
        );

        return redirect()
            ->route('personas.index')
            ->with(
                'success',
                'Persona registrada correctamente.'
            );
    }

    public function edit(Persona $persona): Response
    {
        return Inertia::render(
            'modules/personas/edit',
            [
                'persona' => $persona
            ]
        );
    }

    public function destroy(Persona $persona)
    {
        $this->personaService->eliminar($persona);

        return redirect()
            ->route('personas.index');
    }
}