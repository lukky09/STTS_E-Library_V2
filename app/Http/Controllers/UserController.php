<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Rules\CorrectPasswordRule;
use App\Rules\RegisteredUserRule;
use App\Rules\UniqueMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function doLogin(Request $req)
    {
        $req->validate([
            'userlogin'=>"required",
            'password'=>"required",
        ]);

        $credential = [
            'user_email' => strtolower($req->userlogin),
            'password' => $req->password
        ];

        if(Auth::guard('user_provider')->attempt($credential)){
            dd(getAuthUser());
        }else{
            //gagal masuk
        }

        // $user = user::where('user_email',$req->userlogin)->get();
        // $count = count($user);
        // // dump($count);
        // // dump($user);
        // $req->validate([
        //     'userlogin'=>["required", new RegisteredUserRule($count)],
        // ]);
        // $user = $user[0];
        // $req->validate([
        //     'password'=>["required", new CorrectPasswordRule($user->user_pass)],
        // ]);
        // Session::put('login',$user->user_id);
        return redirect('/');
    }
    public function doRegis(Request $req)
    {
        # code...
        $req->validate(
            [
                'user_email' => ["required","email", new UniqueMail()],
                'user_fname' => "required",
                'user_lname' => "required",
                'user_pass' => "required|min:8|confirmed",
            ]
        );
        user::create($req->all());

        return redirect('/login');
    }
    public function doUpdateProfile(Request $req)
    {
        # code...
    }
    public function doLogout(Request $req){
        Session::forget('login');
        return redirect('/');
    }
}
