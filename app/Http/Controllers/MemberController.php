<?php

namespace App\Http\Controllers;

use App\Models\members;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MemberController extends Controller
{
    public function show(){
        $data = members::all();
        return view('userseeder',['member'=>$data]);
    }
}
