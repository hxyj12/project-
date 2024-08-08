<?php

namespace App\Http\Controllers;

use App\Mail\email\welcome;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;;

class UserController extends Controller
{
    //

    public function create(){
        return view("aaaa");
    }

  public function store(Request $request){
    $formField=$request->validate([
      'name'=>['required','min:3'],
      'email'=>['required','email' ,Rule::unique('user','email')],
      'password'=>'required|confirmed|min:6'
    ]);

    $formField['password']=bcrypt($formField['password']);

    $user=User::create($formField);
    auth()->login($user);
    return redirect('/')->with('message','User created and logged in');
  }

  public function register(Request $request){
    $formField=$request->validate([
      'name'=>['required','min:3'],
      'email'=>['required','email' ,Rule::unique('users','email')],
      'password'=>'required|confirmed|min:6'
    ]);

  $otp= rand(100000,999999); 
  $formField['password']=bcrypt($formField['password']);
  $formField['otp']=$otp ;
  $table = User::create($formField);
  Mail::to($table->email)->send(new welcome($table));
  }

  public function verifyForm(){
    return view('verify');
  }

  public function verify(Request $request){
    $formField=$request->validate([
      'otp'=>['required'],
    ]);

    $otp = User::where("otp","=",$request->otp)->first();

    $date = new DateTime();

    if($otp){
      $otp->update([
        'email_verified_at' => $date->format('Y-m-d H:i:s')
      ]);
      //dd($otp);
      return redirect('/login')->with('message','User verified');
    }

    return redirect('/verify');
  }

  public function loginpage(){
    return view('bbbb');
  }

  public function login(Request $request){
    $formField=$request->validate([
      'email'=>['required','email'],
      'password'=>'required'
    ]);

    $user=Auth::attempt($formField);
    if ($user) {
      return redirect('/')->with('message','User logged in');
    }else{
      return redirect('/bbbb')->with('message','Invalid credentials');
    }
    
       
  }
}
