<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $fillable=['category'];
    // public function relUsers()
    // {
    //     return $this->hasone('App\User','id','id_user');
    // }
}
