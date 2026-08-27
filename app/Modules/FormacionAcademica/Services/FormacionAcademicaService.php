<?php

namespace App\Modules\FormacionAcademica\Services;

use App\Modules\FormacionAcademica\Models\FormacionAcademica;

class FormacionAcademicaService
{
    public function crear(
        array $data
    ): FormacionAcademica {

        return FormacionAcademica::create($data);
    }

    public function actualizar(
        FormacionAcademica $formacion,
        array $data
    ): FormacionAcademica {

        $formacion->update($data);

        return $formacion->refresh();
    }

    public function eliminar(
        FormacionAcademica $formacion
    ): void {

        $formacion->delete();
    }
}