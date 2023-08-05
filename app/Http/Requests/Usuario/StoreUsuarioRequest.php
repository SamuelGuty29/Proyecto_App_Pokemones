<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    // Funcion para validar datos del usuario
    static public function myRules(){
        return [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|min:5'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
    */


    // Creamos nuestra funcion para obtener las reglas personalizadas.
    public function rules(){
        return $this->myRules();
    }
}