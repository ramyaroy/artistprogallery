<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfiles extends Model
{
    protected $table = 'userprofiles';
    protected $fillable = [
        'profile_image', 'user_id','gallery_type_id'
     ];
}
