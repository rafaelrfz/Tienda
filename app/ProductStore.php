<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    protected $fillable = [
        'id_product',
        'id_store',
        'price_store',        
    ];

    protected $table = 'product_store';
}
