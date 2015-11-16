<?php

namespace vRemind;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
     protected $table = 'notifications';


     protected $fillable = ['sender_id', 'class_id', 'content', 'file', 'schedule', 'translate'];
}
