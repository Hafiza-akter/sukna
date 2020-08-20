<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    public function getUserRole(){
         return $this->belongsTo(
             'App\Model\Role','role_id');
    }
    public function getUserLocation(){
        return $this->belongsTo(
            'App\Model\Location','location_id');
   }

}
