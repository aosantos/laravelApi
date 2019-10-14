<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
             'nome'           => "required",          
             'email'          => "required|unique:cliente",
             'telefone'       => 'required','numeric',            
             'data'           => 'required|date_format:"d/m/Y"',
             'dataNascimento' => 'required|date_format:"d/m/Y"',
             'endereco'       => 'required',
             'bairro'         => 'required',
             'cep'            => 'required|numeric',            
        ];
    }
}
