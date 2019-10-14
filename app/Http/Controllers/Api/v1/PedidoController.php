<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Http\Requests\StoreUpdatePedidoFormRequest;
use Carbon\Carbon;
use App\Mail\SendMailUser;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
    private $pedido, $totalPage = 10;
    private $path = 'pedido';

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }
    public function index(Request $request)
    {
        $pedido = $this->pedido->getResults($request->all(), $this->totalPage);
        return response()->json($pedido);
    }

    public function store(StoreUpdatePedidoFormRequest $request)
    {               
        $pedido = $this->pedido::create([
            'idCliente'             => $request->idCliente,
            'idPastel'              => $request->idPastel,
            'dataCriacao'           =>  Carbon::now()
        ]);
        
        $detalhes = Pedido::detalhes($request->idCliente, $request->idPastel);
        
        //Enviar email com detalhes do pedido        
        $contato = [
            'title'         => 'Detalhes do Pedido',
            'nome'          => $detalhes[0]['nome'],
            'telefone'      => $detalhes[0]['telefone'],
            'endereco'      => $detalhes[0]['endereco'],
            'complemento'   => $detalhes[0]['complemento'],
            'cep'           => $detalhes[0]['cep'],
            'dataCadastro'  => $detalhes[0]['dataCadastro'],
            'body'          => 'Pedido efetuado com Sucesso'
        ];       
        Mail::to($detalhes[0]['email'])->send(new SendMailUser($contato));
            
        return response()->json($pedido, 201);
        
    }


    public function show($id)
    {       
        if (!$pedido = $this->pedido->find($id)) :
            return response()->json(['error' => 'Not Found'], 404);
        endif;
        $pedido = Pedido::show($id);
        return response()->json($pedido);
    }

    public function update(StoreUpdatePedidoFormRequest $request, $id)
    {
        if (!$pedido = $this->pedido->find($id)) :
            return response()->json(['error' => 'Not Found'], 404);
        endif;
        $pedido->update([
            'idCliente'             => $request->idCliente,
            'idPastel'              => $request->idPastel,
            'dataCriacao'           =>  Carbon::now()
        ]);
        return response()->json($pedido);
    }

    public function destroy($id)
    {
        if (!$pedido = $this->pedido->find($id)):
            return response()->json(['error' => 'Not found'], 404);
        endif;

        $pedido->delete();

        return response()->json(['success' => true], 204);
    }
}

