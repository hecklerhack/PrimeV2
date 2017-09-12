<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function auth(Request $request, $email, $password)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($email);
        if($user != null)
        {
            return redirect('/');
        }
    }
}
