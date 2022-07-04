<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Langganan extends Model
{
    protected $guarded = array(
        'id',
        'timestamps'
    );
    public function subscription(){
        return $this->belongsTo(Subscription::class,'subs_id');
    }
    public function namaPaket($id){
        $awal = Subscription::where('id',$id)->first()->nama_paket;
        return $awal;
    }
    public function userSubs(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function namaUser($id){
        $awal = User::where('id',$id)->get('namaMember')->first();
        return $awal;
    }
    use HasFactory;
}
