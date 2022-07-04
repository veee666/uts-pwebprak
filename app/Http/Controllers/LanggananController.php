<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langganan;


class LanggananController extends Controller
{
    public function index(){
        $subs = Langganan::all();
        return view('admin.history.index', [
            'subs'=>$subs
        ]);
    }
}
