<?php

use App\Http\Controllers\MemberController;
use App\Models\Listings;
use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\members;
use GuzzleHttp\Middleware;

Route::get('/', function (){
    return view('welcome');
});

Route::get('hello', function () {
    return response("<h1>hello world</h1>",200)
    ->header('content-Type','text/plain');
});

// // Registration routes
// Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'RegisterController@register')->name('register');

// // Login routes
// Route::get('login', 'LoginController@showLoginForm')->name('login');
// Route::post('login', 'LoginController@login')->name('login');

Route::get('/register',function(){
    return view('register');
});

Route::post('/register',function(Request $request){
    $data=register::where('name','=',$request->name)->get();
    
    if (count($data)>0) {
        return redirect('/register')->with('register','name already exist');
    }else{
        $insert=new register();
        $insert->name=$request->name;
        $insert->email=$request->email;
        $insert->password=Hash::make($request->password);
        $insert->save();
        return redirect('/register')->with('register','register success');
    }
});

Route::get('/login',function(){
    return view('login');
});

Route::post('/login',function(Request $request){
    $data=register::where('email','=',$request->email)->get();
    if (count($data)===1) {
        if (Hash::check($request->password,$data[0]->password)) {
            return redirect('/login')->with('login','login success');
        }else {
            return redirect('/login')->with('logins','password wrong');
        }
    }else{
        return redirect('/login')->with('logins','didt have account');
    }
});
Route::get('/userseeder',[MemberController::class,"show"])->name('userseeder');

Route::get("/register",[UserController::class,'create']);

Route::post("/users",[UserController::class,'store']);

Route::get("/aaaa",[UserController::class,'create']);

Route::post("/aaaa",[UserController::class,'register'])->name('register');

// routes/web.php 

Route::get('/verify',[UserController::class,'verifyForm'])->name('verifyForm');

Route::put('/verify',[UserController::class,'verify'])->name('verify');

Route::get("/bbbb",[UserController::class,'loginpage']);

Route::post("/bbbb",[UserController::class,'login'])->name('login');



