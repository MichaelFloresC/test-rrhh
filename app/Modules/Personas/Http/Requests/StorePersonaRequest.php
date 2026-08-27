<?php

namespace App\Modules\Personas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dni' => [
                'required',
                'digits:8',
                'unique:personas,dni'
            ],

            'nombres' => [
                'required',
                'string',
                'max:150'
            ],

            'apellido_paterno' => [
                'required',
                'string',
                'max:100'
            ],

            'apellido_materno' => [
                'nullable',
                'string',
                'max:100'
            ],

            'fecha_nacimiento' => [
                'nullable',
                'date'
            ],

            'telefono' => [
                'nullable',
                'string',
                'max:20'
            ]
        ];
    }
}