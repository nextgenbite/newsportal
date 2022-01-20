<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $uploads = '/images/';
    protected $fillable = ['image','social','about'];

    public function getImageAttribute($setting){


        return $this->uploads . $setting;


    }
}
