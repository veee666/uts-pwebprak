<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    use HasFactory;
    protected $guarded = array(
        'id',
        'timestamps'
    );

    public function subs(){
        return $this->belongsTo('App\Models\Subscription');
    }

    public function namaPaket($id){
        $awal = Subscription::where('id',$id)->get('nama_paket')->first();
        return $awal;
    }

    public function history(){
        return $this->hasMany('App\Models\Langganan','user_id','id');
    }
}
