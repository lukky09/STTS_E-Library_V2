<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Rules\UniqueMail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function doLogin(Request $req)
    {
        # code...
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
}
