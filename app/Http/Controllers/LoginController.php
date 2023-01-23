<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Rules\MailActive;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class LoginController extends Controller
{
    
    public function login(){
        if (Auth::check()){
            return redirect('/');
        } else {   
            return view('login');
        }
    }

    public function actionLogin(Request $request){

        $validatedData = $request->validate([
            'email' => ['required', new MailActive()],
            'password' => ['required'],
        ]);

        
        $data = [
            'email' => $request->input('email'),
            'password' => $request -> input('password'),
            'active' => 1
        ];


        if (Auth::attempt($data)){
            return redirect('/');
        } else {
            $request->session()->flash('error', 'Incorrect email or password');
            return redirect('/login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }


}
