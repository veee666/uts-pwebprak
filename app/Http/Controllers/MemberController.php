<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function landing(){
        return view('landing');
    }

    public function about(){
        return view('about');
    }

    public function services(){
        return view('service');
    }

    public function dashboard(){
        $member = Members::all();
        return view('dashboard', ['member'=>$member]);
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
        Members::create($request->all());
        return redirect('/dashboard');       
    }

    public function edit($id){
	    $member = Members::where('id',$id)->get();
	    return view('editMember',['member' => $member]);
    }

    public function update(Request $request){
        Members::where('id',$request->id)->update([
            'namaMember' => $request->namaMember,
            'noTelpMember' => $request->noTelpMember,
            'umurMember' => $request->umurMember,
            'emailMember' => $request->emailMember
        ]);
        return redirect('/dashboard');
    }

    public function delete($id){
	    Members::where('id',$id)->delete();
	    return redirect('/dashboard');
    }
}
