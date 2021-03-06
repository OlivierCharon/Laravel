<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    
    public function user(){
        return $this->hasMany('App\User');
    }
}
