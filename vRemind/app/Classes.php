<?php

namespace vRemind;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['class_code', 'class_name', 'icon', 'is_public'];

    /**
      * Set timestamps off
      */
     public $timestamps = false;
 
     /**
      * Get classes with a certain role
      */
     public function classes()
     {
         return $this->belongsToMany('Classes', 'class_users');
     }
}
