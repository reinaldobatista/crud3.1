<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $table='carrinho';
    protected $fillable=['qtd','value','user_name','products_name'];
    // public function relUsers()
    // {
    //     return $this->hasone('App\User','id','id_user');
    // }
}
