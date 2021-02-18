<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'id_city';

    protected $fillable = [
        'city_name',
        'id_country'
    ];

    

    public function country(){
        return $this->belongsTo(Country::class, 'id_city');
    }

    public function providers(){
        return $this->hasMany(Provider::class, 'id_city');
    }

    public function stores(){
        return $this->hasMany(Store::class, 'id_city');
    }
}
