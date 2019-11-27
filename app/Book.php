<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author', 'genre_id',
    ];
    
    public function genre(){
        return $this->belongsTo('App\Genre');
    }
}
