<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table='story';
    protected $fillable=['story'];
    // public function relUsers()
    // {
    //     return $this->hasone('App\User','id','id_user');
    // }
}
