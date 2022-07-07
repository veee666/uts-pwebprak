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
                        return redirect()->route('dashboard-admin');
                    }
                    else{
                        Auth::logout();
                        return redirect()->back()->with('error','Not an Admin, Login Failed');
                    }
                    
                }else{
                    return redirect()->back()->with('error','Wrong Credentials, Login Failed');
                }

       return back()->with('error','Not an Admin, Login Failed');
    }
}
