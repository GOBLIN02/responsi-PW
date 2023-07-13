<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(){
        return view('auth/register');
    }

    public function registerSimpan(Request $request){
        validator::make($request->all(), [
            'nama'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed'
        ])->validate();

        user::create([
            'nama'=> $request,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'level'=>'Admin'
        ]);

        return redirect()->route('Login');
    }

}
