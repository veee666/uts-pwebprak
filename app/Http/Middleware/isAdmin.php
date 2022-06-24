<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $credentials = $request->only('namaMember', 'password');
        $nama=$request->nama;
        if (Auth::attempt($credentials)) {
                    // Authentication passed...
                    if(Auth::user()->admin == true){
                        $request->session()->regenerate();
                        $id = Auth::user()->id;
                        return redirect('/dashboard-admin');
                    }
                    else{
                        Auth::logout();
                        Session::flash('Anda Bukan Admin','Login Failed');
                        return redirect()->back()->withInput();
                    }
                    
                }else{
                    Session::flash('error-password','Login Failed');
                    return redirect()->back()->withInput();
                }

       return back()->with('error','Anda bukan admin');
    }
}
