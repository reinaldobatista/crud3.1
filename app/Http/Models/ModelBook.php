<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    protected $table='products';
    protected $fillable=['title','id_user','estoque','price'];

    public function relUsers()
    {
        return $this->hasone('App\User','id','id_user');
    }
}
