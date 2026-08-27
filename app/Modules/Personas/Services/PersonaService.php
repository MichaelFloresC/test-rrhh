<?php

namespace App\Modules\Personas\Services;

use App\Modules\Personas\Models\Persona;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PersonaService
{
    public function listar(
        ?string $buscar = null
    ): LengthAwarePaginator {

        return Persona::query()

            ->when($buscar, function ($query, $buscar) {

                $query->where(function ($query) use ($buscar) {

                    $query->where('dni', 'like', "%{$buscar}%")
                        ->orWhere('nombres', 'like', "%{$buscar}%")
                        ->orWhere(
                            'apellido_paterno',
                            'like',
                            "%{$buscar}%"
                        );

                });

            })

            ->orderBy('apellido_paterno')

            ->paginate(20)

            ->withQueryString();
    }

    public function crear(array $data): Persona
    {
        return Persona::create($data);
    }

    public function actualizar(
        Persona $persona,
        array $data
    ): Persona {

        $persona->update($data);

        return $persona->refresh();
    }

    public function eliminar(Persona $persona): void
    {
        $persona->delete();
    }
}