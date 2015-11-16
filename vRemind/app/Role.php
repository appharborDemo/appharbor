<?php

namespace vRemind;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
      * Set timestamps off
      */
     public $timestamps = false;
 
     /**
      * Get users with a certain role
      */
     public function users()
     {
         return $this->belongsToMany('User', 'users_roles');
     }
}
