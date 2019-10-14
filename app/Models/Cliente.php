<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $dates     = ['deleted_at'];
    protected $table     = 'cliente';
    protected $fillable  = ['nome','email','telefone','data','dataNascimento','endereco','complemento','bairro','cep','dataCadastro'];
    public $timestamps   = false;
    
    public function getResults($name = null){
        if(!$name):
            return $this->get();
        endif;
        return $this->where('name','LIKE',"%{$name}%")->get();
    }   
}
