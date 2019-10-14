<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;
    protected $dates        = ['deleted_at'];
    protected $table        = 'pedido';
    protected $fillable     = ['idCliente', 'idPastel', 'dataCriacao'];
    public $timestamps      = false;

    public function getResults()
    {          
        $pedidos = Pedido::join('cliente', 'pedido.idCliente', '=', 'cliente.id')                     
                  ->join('pastel', 'pedido.idPastel', '=', 'pastel.id')->get();
                               
        return $pedidos;
    }
     public static function show($id)
    {          
        $pedidos = Pedido::join('cliente', 'pedido.idCliente', '=', 'cliente.id')                     
                  ->join('pastel', 'pedido.idPastel', '=', 'pastel.id')
                  ->where('pedido.id', '=', $id)                
                  ->get();
                          
        return $pedidos;
    }
    public static function detalhes($idCliente, $idPastel) {
        $detalhes = Pedido::select('cliente.nome As nome','cliente.email','cliente.telefone','cliente.endereco','cliente.complemento','cliente.bairro','cliente.cep', 'cliente.dataCadastro' , 'pastel.nome AS pastel', 'pastel.preco') 
                ->join('cliente', 'pedido.idCliente', '=', 'cliente.id')
                ->join('pastel', 'pedido.idPastel', '=', 'pastel.id')
                ->where('cliente.id', '=', $idCliente)
                ->where('pastel.id', '=', $idPastel)
                ->limit('1')
                ->get();

        return $detalhes;
    }

}


