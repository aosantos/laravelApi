<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pastel extends Model
{
    use SoftDeletes;
    protected $dates        = ['deleted_at'];
    protected $table        = 'pastel';
    protected $fillable     = ['nome', 'preco', 'foto'];
    public $timestamps      = false;

    public function getResults($name = null){
        if(!$name):
            return $this->get();
        endif;
        return $this->where('name','LIKE',"%{$name}%")->get();
    }

}
