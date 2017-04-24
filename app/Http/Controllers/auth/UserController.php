<?php

namespace App\Http\Controllers\auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDashboard()
    {
        return view('dashboard');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['username'=> $request['username'], 'password' => $request['password']]))
        {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }
    }
}

?>