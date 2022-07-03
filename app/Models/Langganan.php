<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langganan extends Model
{
    protected $guarded = array(
        'id',
        'timestamps'
    );
    public function subscription(){
        return $this->belongsTo('App\Models\Subscription');
    }
    public function userSubs(){
        return $this->belongsTo('App\Models\User');
    }
    use HasFactory;
}
