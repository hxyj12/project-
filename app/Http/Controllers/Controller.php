<?php
namespace App\Http\Controllers;

use App\Models\register;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = register::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login')->with('success', 'User created successfully!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'equired|string|max:255',
            'email' => 'equired|string|email|max:255|unique:users',
            'password' => 'equired|string|min:8|confirmed',
            'password_confirmation' => 'equired|string|min:8',
    ]);
}
}