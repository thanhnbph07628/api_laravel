<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable=[
        'name',
        'images',
        'price',
        'sale',
        'amount',
        'description',
        'detail',
        'views',
        'iddm',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','iddm','id');
    }
}
