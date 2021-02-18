<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';

    public function category(){
        return $this->belongsTo(Category::class, 'id_product');
    }
    protected $fillable = [
        'product_name',
        'provider_price',
        'id_category',
        'id_provider'
    ];

    public function stores (){
        return $this->belongsToMany(Store::class, 'product_store', 'id_product', 'id_store');
    }
}
