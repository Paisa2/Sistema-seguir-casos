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
            // 'derivar_casos' => 'required',
            // 'image' => 'required|file',

            'denunciante_nombre' => 'required',
            'denunciante_apellido' => 'required',
            'denunciante_ci' => 'required',
            'denunciante_edad' => 'required',
            'denunciante_ocupacion' => 'required',
            'denunciante_estado_civil' => 'required',
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
            'image.required' => 'El archivo es obligatoria.',
            'denunciante_nombre.required' => 'El nombre del denunciante es obligatorio',
            'denunciante_apellido.required' => 'El apellido del denunciante es obligatorio',
            'denunciante_ci.required' => 'El CI del denunciante es obligatorio',
            'denunciante_edad.required' => 'La edad del denunciante es obligatoria',
            'denunciante_ocupacion.required' => 'La ocupacion del denunciante es obligatoria',
            'denunciante_estado_civil.required' => 'El estado civil del denunciante es obligatorio',
            'denunciante_telefono.required' => 'El telefono del denunciante es obligatorio',

            'denunciado_nombre.required' => 'El nombre del denunciado es obligatorio',
            'denunciado_apellido.required' => 'El apellido del denunciado es obligatorio',
            'denunciado_ci.required' => 'El CI del denunciado es obligatorio',
            'denunciado_edad.required' => 'La edad del denunciado es obligatorio',
            'denunciado_telefono.required' => 'El telefono del denunciado es obligatorio',

        ];
    }
}
