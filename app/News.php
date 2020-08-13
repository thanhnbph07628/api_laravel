<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable=[
        'iddm',
        'name',
        'images',
        'description',
        'detail',
        'views'
    ];

    public function catenews()
    {
        return $this->belongsTo('App\CateNews','iddm','id');
    }
}
