<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Rules\ConfirmPassword;
use App\Rules\CheckCurrentPassword;
use Auth;
use Session;

class ProfileController extends Controller
{
    public function viewProfile(){
        return view('profile');
    }
    public function viewEditPassword(){
        return view('editPassword');
    }

    public function EditPassword(Request $request){
        $validatedData = $request->validate([
            'password_sekarang' => ['required',  new CheckCurrentPassword],
            'password' => ['required'],
            'password_verify' => ['required',new ConfirmPassword($request -> password)]
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'password' => Hash::make($request -> password)
            ]);

        Session::flash('message', 'Password berhasil diupdate');
        return redirect('profile/edit-password');

    }


    public function updateProfile(Request $request){
        $validatedData = $request->validate([
            'name' => ['required'],
            'first_name' => ['required','max:150'],
            'last_name' => ['max:150'],
            'phone_number' => ['required','numeric']
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'first_name' =>$request -> first_name ,
                'last_name' =>$request -> last_name ,
                'phone_number' =>$request -> phone_number
            ]);

            Session::flash('message', 'Profile berhasil diupdate');
            return redirect('profile');
    }
}
