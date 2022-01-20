<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //
    protected $uploads = '/images/';
    protected $fillable = [

        'title',
        'url',
        'image',
        'location',
        'status',
    ];
    public function getImageAttribute($advertisement){


        return $this->uploads . $advertisement;


    }
}
