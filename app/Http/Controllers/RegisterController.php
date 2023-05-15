<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;
use Illuminate\Validation\Rule;
use App\Rules\ConfirmPassword;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function actionregister(Request $request)
    {
        $str = Str::random(100);

        $validatedData = $request->validate([
            'email' => ['required',Rule::unique('users')],
            'name' => ['required'],
            'password' => ['required'],
            'first_name' => ['required','max:150'],
            'last_name' => ['max:150'],
            'phone_number' => ['required','numeric'],
            'password_verify' => ['required',new ConfirmPassword($request -> password)]
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'first_name' =>$request -> first_name ,
            'last_name' =>$request -> last_name ,
            'phone_number' =>$request -> phone_number,
            'role' => 'tourist',
            'verify_key' => $str,
            'active' => 0

        ]);

        $details = [
            'username' => $request->name,
            'first_name' =>$request -> first_name ,
            'last_name' =>$request -> last_name ,
            'phone_number' =>$request -> phone_number,
            'url' => request()->getHttpHost().'/register/verify/'.$str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'A verification link has been sent to your email. Please Check Your Email to Activate Account');
        return redirect('register');
    }
    
    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
                    ->where('verify_key', $verify_key)
                    ->exists();
        
        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)
            ->update([
                'active' => 1
            ]);
            
            return "Verifikasi Berhasil. Akun Anda sudah aktif.";
        }else{
            return "Key tidak valid!";
        }
    }
}
   