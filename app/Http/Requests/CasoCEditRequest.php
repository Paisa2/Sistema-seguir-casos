<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CasoCEditRequest extends FormRequest
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
            'numero_caso' => 'required|integer|max:999|unique:casos',
            'tipologia_caso' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
            // 'derivar_casos' => 'required',
            'image' => 'required|file',

            'denunciante_nombre' => 'required|string|max:255',
            'denunciante_apellido' => 'required|string|max:255',
            'denunciante_ci' => 'required|integer|unique:casos',
            'denunciante_edad' => 'required|integer',
            'denunciante_ocupacion' => 'required|string|max:255',
            'denunciante_estado_civil' => 'required|string|max:255',
            'denunciante_telefono' => 'required|integer',
            'denunciante_sexo' => 'required|string|max:255',

            'denunciado_nombre' => 'required|string|max:255',
            'denunciado_apellido' => 'required|string|max:255',
            'denunciado_ci' => 'required|integer|unique:casos',
            'denunciado_edad' => 'required|integer',
            'denunciado_telefono' => 'required|integer',
            'denunciado_sexo' => 'required|string|max:255',
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
            'responsable_caso.required' => 'El estado del responsable es obligatorio.',
            'image.required' => 'El archivo del caso es obligatorio.',

            'archivo.required' => 'El archivo es obligatoria.',
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
