<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['name','price','description','category_category','image'];
    public function search($filter)
    {
        $results=$this->where(function($query) use($filter){
                if ($filter)
                {
                    $query->where('name','LIKE',"%{$filter}%");
                }
        })->paginate();
        return $results;

    }
    
    // public function relUsers()
    // {
    //     return $this->hasone('App\User','id','id_user');
    // }
}
