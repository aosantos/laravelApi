<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePastelFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {       
        return [
            'nome'       => 'required',
            'preco'      => 'required|numeric', 
            'foto'       => 'required|mimes:jpeg,bmp,png'
        ];
    }
}
