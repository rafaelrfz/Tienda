<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $primaryKey = 'id_provider';

    protected $fillable = [
        'provider_name',
        'id_city'
    ];

    public function city(){
        return $this->belongsTo(City::class, 'id_provider');
    }

    public function products(){
        return $this->hasMany(Product::class, 'id_provider');
    }
}
