<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $fillable = [
        'image_name', 'alt_image_name','user_id'
     ];


    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
