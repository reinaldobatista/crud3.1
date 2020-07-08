<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    protected $table='deposito';
    protected $fillable=['qtd','story_story','products_name','category_category'];
    // public function relUsers()
    // {
    //     return $this->hasone('App\User','id','id_user');
    // }
}
