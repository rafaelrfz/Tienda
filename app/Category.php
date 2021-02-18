<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id_category';

    protected $fillable = [
        'category_name',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'id_category');
    }
}
