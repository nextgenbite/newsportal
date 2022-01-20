<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $uploads = '/images/';
    //
    protected $fillable = [

        'category_id',
        'title',
        'slug',
        'image',
        'body',
        'status',



    ];
    public function getImageAttribute($post){


        return $this->uploads . $post;


    }

    public function category(){


        return $this->belongsTo('App\Category');


    }
}
