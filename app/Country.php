<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey = 'id_country';
    protected $fillable = [
        'country_name'
    ];

    public function cities(){
        return $this->hasMany(City::class, 'id_country');
    }
}
