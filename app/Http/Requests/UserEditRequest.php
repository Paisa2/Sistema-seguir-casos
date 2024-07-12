<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'name' => 'required',
            // Logic for findOrFail
            // 'username' => 'unique:users,username,'.$this->user.'|required',
            'apellido' => 'required',
            'email' => [
                'required', 'unique:users,email,' . request()->route('user')->id
            ],
            // 'password' => 'sometimes',
            'password' => 'required',
            'cargo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio ',
            'apellido.required' => 'El campo apellido es obligatorio',
            'email.required' => 'El campo correo es obligatorio',
            'password.required' => 'El campo contraña es obligatorio',
            'cargo.required' => 'El campo cargo es obligatorio',
        ];
    }
}
