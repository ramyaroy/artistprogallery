<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GalleryTypes extends Model
{
    protected $fillable = [
        'gallery_type_name','template'
     ];

     public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
