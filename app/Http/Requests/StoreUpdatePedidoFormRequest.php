<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePedidoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {      
        return [
            'idCliente'       => 'required|numeric',  
            'idPastel'        => 'required|numeric',            
        ];
    }
}
