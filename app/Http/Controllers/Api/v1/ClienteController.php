<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Http\Requests\StoreUpdateFormRequest;
use Carbon\Carbon;

class ClienteController extends Controller
{
    private $cliente, $totalPage = 10;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Cliente $cliente, Request $request)
    {
        $cliente = $this->cliente->getResults($request->name);
        return response()->json($cliente, 200);
    }
    public function show($id)
    {
        if (!$cliente = $this->cliente->find($id)) :
            return response()->json(['error' => 'Not Found'], 404);
        endif;
        $cliente = $this->cliente->find($id);
        return response()->json($cliente);
    }
    public function store(StoreUpdateFormRequest $request)
    {
        $cliente = $this->cliente::create([
            'nome'                  => $request->nome,
            'email'                 => $request->email,
            'telefone'              => $request->telefone,
            'data'                  => implode("-",array_reverse(explode("/",$request->data))),
            'dataNascimento'        => implode("-",array_reverse(explode("/",$request->dataNascimento))),
            'endereco'              => $request->endereco,
            'complemento'           => $request->complemento,
            'bairro'                => $request->bairro,
            'cep'                   => $request->cep,
            'dataCadastro'          => Carbon::now()
        ]);

        return response()->json($cliente, 201);
    }


    public function update(StoreUpdateFormRequest $request, $id)
    {
        if (!$cliente = $this->cliente->find($id)) :
            return response()->json(['error' => 'Not Found'], 404);
        endif;
        $cliente->update([ 'nome'   => $request->nome,
            'email'                 => $request->email,
            'telefone'              => $request->telefone,
            'data'                  => implode("-",array_reverse(explode("/",$request->data))),
            'dataNascimento'        => implode("-",array_reverse(explode("/",$request->dataNascimento))),
            'endereco'              => $request->endereco,
            'complemento'           => $request->complemento,
            'bairro'                => $request->bairro,
            'cep'                   => $request->cep,
            'dataCadastro'          =>  Carbon::now()]);
        return response()->json($cliente);

    }    
   
    public function destroy($id)
    {        
        if (!$cliente = $this->cliente->find($id))
            return response()->json(['error' => 'Not found'], 404);

        $cliente->delete();

        return response()->json(['success' => true], 204);
    }
}
