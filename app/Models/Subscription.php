<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = array(
        'id',
        'timestamps'
    );

    public function user_sub(){
        return $this->hasMany('App\Models\User','subs_id','id');
    }
}
