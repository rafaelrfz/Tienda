<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $primaryKey = 'id_store';

    protected $fillable =[
        'store_name',
        'id_city'
    ];

    public function city(){
        return $this->belongsTo(City::class, 'id_store');
    }

    public function products (){
        return $this->belongsToMany(Product::class, 'product_store', 'id_store', 'id_product');
    }
}
