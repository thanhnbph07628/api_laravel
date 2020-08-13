<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'name',
        'images',
        'description'
    ];

    public function getTotalProductsAttribute()
    {
        return $this->hasMany('App\Products','iddm','id')->where('iddm',$this->id)->count();    
    }

    public function products()
    {
        return $this->hasMany('App\Products','iddm','id');
    }
}
