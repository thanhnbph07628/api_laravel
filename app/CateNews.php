<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateNews extends Model
{
    protected $table = 'catenews';
    protected $fillable = [
        'name',
        'images',
        'description'
    ];

    public function getTotalNewsAttribute()
    {
        return $this->hasMany('App\News','iddm','id')->where('iddm',$this->id)->count();    
    }

    public function news()
    {
        return $this->hasMany('App\News','iddm','id');
    }
}
