<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'class', 'life_duration'
    ];
    
    public function animal(){
        return $this->hasMany('App\Animal');
    }
}
