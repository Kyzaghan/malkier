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
            'department' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {

            // Kullanıcının departman yetkisi olup olmadığı kontrol ediliyor
            if(Auth::user()->departments()->where('department_id', $request['department'])->count() > 0)
            {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors('Departmanda oturum açma izniniz bulunmuyor.');
            }

        } else {
            return redirect()->back()->withErrors('Kullanıcı adı veya şifre hatalı');
        }
    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}

?>