<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CasoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numero_caso' => 'required',
            'tipologia_caso' => 'required',
            'fecha_registro' => 'required|date',
            'derivar_casos' => 'required',
            'image' => 'required|file',

            'denunciante_nombre' => 'required',
            'denunciante_apellido' => 'required',
            'denunciante_ci' => 'required',
            'denunciante_edad' => 'required',
            'denunciante_ocupacion' => 'required',
            'denunciante_telefono' => 'required',

            'denunciado_nombre' => 'required',
            'denunciado_apellido' => 'required',
            'denunciado_ci' => 'required',
            'denunciado_edad' => 'required',
            'denunciado_telefono' => 'required',
            'unidad' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'numero_caso.required' => 'El número de caso es obligatorio.',
            'tipologia_caso.required' => 'La tipología del caso es obligatoria.',
            'fecha_registro.required' => 'La fecha de registro es obligatoria.',
            'derivar_casos.required' => 'El estado de derivación es obligatorio.',
            'image.required' => 'La imagen es obligatoria.',

            'denunciante_nombre' => 'El nombre del denunciuante es obligatorio',
            'denunciante_apellido' => 'El apellido del denunciante es obligatorio.',
            'denunciante_ci' => 'El CI del denunciante es obligatorio.',
            'denunciante_edad' => 'La edad del denunciante es obligatoria.',
            'denunciante_ocupacion' => 'La ocupación del denunciante es obligatoria.',
            'denunciante_telefono' => 'El telefono del denunciante es obligatorio',

            'denunciado_nombre' => 'El nombre del denunciado es obligatorio.',
            'denunciado_apellido' => 'El apellido del denunciado es obligatorio.',
            'denunciado_ci' => 'El CI del denunciado es obligatorio.',
            'denunciado_edad' => 'La edad del denunciado es obligatoria.',
            'denunciado_telefono' => 'El telefono del denunciado es obligator',
        ];
    }
}
