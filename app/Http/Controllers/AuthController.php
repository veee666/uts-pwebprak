<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function show_regist(){
        return view('auth.register');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'password'=>'required',
            'namaMember' => 'required|regex:/^[a-z\d\-_\s]+$/i',
            'noTelpMember' => 'required|numeric',
            'emailMember' => 'required',
            'tgl_lahir' => 'required'
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
            'tgl_lahir'=>$tanggal_lahir,
            'noTelpMember'=>$request->noTelpMember,
            'emailMember'=>$request->emailMember,
            'fotoMember'=>$foto_member
        ]);
        return redirect()->route('showLogin');    
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'namaMember'    => 'required|string',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('namaMember', 'password');
        $nama=$request->nama;
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();
            $id = Auth::user()->id;
            return redirect('/');
        }else{
            Session::flash('error-password','Login Failed');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function loginAdmin(){
        return view('admin.admin-login');
    }

    // public function authLoginAdmin(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'namaMember'    => 'required|string',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         // flash('error')->error();
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $credentials = $request->only('namaMember', 'password');
    //     $nama=$request->nama;
    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         if(Auth::user()->admin == true){
    //             $request->session()->regenerate();
    //             $id = Auth::user()->id;
    //             return redirect('/dashboard');
    //         }
    //         else{
    //             Auth::logout();
    //             Session::flash('Anda Bukan Admin','Login Failed');
    //             return redirect()->back()->withInput();
    //         }
            
    //     }else{
    //         Session::flash('error-password','Login Failed');
    //         return redirect()->back()->withInput();
    //     }
    // }
}
