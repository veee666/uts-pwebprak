<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Members;
use App\Models\Langganan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class MemberController extends Controller
{
    // UNTUK HOMEPAGE
    public function landing(){
        if (Auth::check()){
            return view('logged.landing',[
                'username' => Auth::user()->namaMember,
                'subs' =>Subscription::all(),
            ]);
        }
        else{
            return view('landing',[
                'subs' =>Subscription::all(),
            ]);
        }
    }

    public function about(){
        return view('about');
    }

    public function services(){
        return view('service');
    }
    
    // Fitur user
    public function dashboardUser(){
        $member = User::where('id',Auth::user()->id)->first();
        $tgl_lahir=Carbon::parse($member->tgl_lahir)->format('d-m-Y');
        return view('logged.dashboard-user',[
            'member'=>$member,
            'tgl_lahir'=>$tgl_lahir
        ]);
    }

    public function editProfile($id){
        $member = User::where('id',$id)->get();
        return view('logged.edit-profile',[ 'member'=>$member ]);
    }

    public function stopSubscription(Request $request){
        $member = User::where('id',$request->id)->update([
            'subs_id'=>null
        ]);
        Langganan::where('user_id',$request->id)->update([
            'end_subscription' =>Carbon::yesterday()->format('Y-m-d')
        ]);
        return redirect()->back();
    }



    // Untuk dashboard admin
    public function dashboardAdmin(){
        $member = User::where('admin', false)->get();
        return view('dashboard-admin', [
            'member'=>$member
        ]);
    }

    public function form(){
        return view('create',[
            'namaMember'=> 'nama',
            'noTelpMember' => 'noTelp',
            'umurMember' => 'umur',
            'emailMember' => 'email'
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
        ]);
        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $foto_member = 'foto_member'.'_'.$request->namaMember.'.'.$request->foto->extension();
        $i=1;
        while(Storage::exists('public/foto_member/'.$foto_member)){
            $foto_member = 'foto_member'.'_'.$request->namaMember.' ('.$i.')'.'.'.$request->foto->extension();
            $i++;
        }
        
        Storage::disk('public')->put($foto_member,  File::get($request->file('foto')));
        Storage::move('public/'.$foto_member,'public/foto_member/'.$foto_member);
        
        $tanggal_lahir = Carbon::parse($request->tgl_lahir)->format('Y-m-d');
        
        User::create([
            'namaMember'=>$request->namaMember,
            'password' => Hash::make($request->password),
            'tgl_lahir' => $tanggal_lahir,
            'noTelpMember'=>$request->noTelpMember,
            'emailMember'=>$request->emailMember,
            'fotoMember'=>$foto_member
        ]);
        return redirect('/dashboard-admin');       
    }

    public function edit($id){
	    $member = User::where('id',$id)->get();
	    return view('editMember',['member' => $member]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->foto != null){
            $foto_member = User::where('id',$request->id)->first();
            $foto_member = $foto_member->fotoMember;
            Storage::delete('public/foto_member/'.$foto_member);

            $foto_member = 'foto_member'.'_'.$request->namaMember.'.'.$request->foto->extension();
            $i=1;
            while(Storage::exists('public/foto_member/'.$foto_member)){
                $foto_member = 'foto_member'.'_'.$request->namaMember.' ('.$i.')'.'.'.$request->foto->extension();
                $i++;
            }
            if(Storage::exists('public/foto_member/'.$foto_member)){
                Storage::delete('public/foto_member/'.$foto_member);
            }
            
            Storage::disk('public')->put($foto_member,  File::get($request->file('foto')));
            Storage::move('public/'.$foto_member,'public/foto_member/'.$foto_member);
        }else{$foto_member = User::where('id',$request->id)->first()->fotoMember;}
        
        if($request->password != null){
            $password = Hash::make($request->password);
            User::where('id',$request->id)->update(['password' => $password,]);   
        }

        $tanggal_lahir = Carbon::parse($request->tgl_lahir)->format('Y-m-d');

        User::where('id',$request->id)->update([
            'namaMember' => $request->namaMember,
            'noTelpMember' => $request->noTelpMember,
            'tgl_lahir' => $tanggal_lahir,
            'emailMember' => $request->emailMember,
            'fotoMember'=> $foto_member
        ]);

        if(Auth::user()->admin == true){
            return redirect('/dashboard-admin');
        }else{return redirect()->route('dashboard-user',Auth::user()->id);}
    }

    public function delete(Request $request){
        $foto_member = User::where('id',$request->member_delete)->first();
        $foto_member = $foto_member->fotoMember;
        Storage::delete('public/foto_member/'.$foto_member);

	    User::where('id',$request->member_delete)->delete();
	    return redirect('/dashboard-admin');
    }
}
