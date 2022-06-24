<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDO;

class SubsController extends Controller
{
    public function index($id){
        return view('formsubs',[
            'id' => $id,
            'username' => Auth::user()->namaMember
        ]);
    }

    public function subscribe(Request $request){
        $validator = Validator::make($request->all(), [
            'CVV' => 'max:3'
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::user()->id;
        
        $user = User::where('id',$user_id)->first();
        $user->update([
            'subs_id' => $request->id
        ]);
        $user->save();

        return redirect()->route('landing');

    }

    public function show(){
        $subs = Subscription::all();
        return view('admin_subs.list_subs', [
            'subs'=>$subs
        ]);
    }

    public function showAddSubs(){
        return view('admin_subs.add_subs');
    }

    public function addSubs(Request $request){
            Subscription::create([
                'nama_paket' => $request->nama_paket,
                'harga_paket' => $request->harga_paket
            ]);
            
            return redirect()->route('listSubs');
            
    }

    public function edit($id){
        $subs = Subscription::where('id', $id)->first();
        return view('admin_subs.edit_subs',[
            'subs' => $subs,
        ]);
    }

    public function update(Request $request){
        Subscription::where('id', $request->id)->update([
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket
        ]);
        return redirect()->route('listSubs');
    }

    public function delete(Request $request){
        Subscription::where('id', $request->subs_delete)->delete();
        return redirect()->route('listSubs');
    }
}
