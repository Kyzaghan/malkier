<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;

/**
 * UserController sınıfı, bu sınıfta kullanıcı giriş, çıkış işlemleri ve profil ile ilgili işlemler yapılır.
 * @package App\Http\Controllers\auth
 */
class UserController extends Controller
{
    /**
     * Giriş yapan kullanıcılara anasayfayı döner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return view('welcome');
        }
    }

    /**
     * Kullanıcı profilini getirir
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile()
    {
        return view('user.profile');
    }

    /**
     * Giriş işlemleri ile ilgili kontrolleri yapar
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'department' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {

            // Kullanıcının departman yetkisi olup olmadığı kontrol ediliyor
            if (Auth::user()->departments()->where('department_id', $request['department'])->count() > 0) {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors('Departmanda oturum açma izniniz bulunmuyor.')->withInput();
            }

        } else {
            return redirect()->back()->withErrors('Kullanıcı adı veya şifre hatalı')->withInput();
        }
    }

    /**
     * Kullanıcı oturumunu kapatır.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login');
        }
    }

    public function saveProfile(Request $request)
    {
        $this->validate($request, [
            'email' => [Rule::unique('users')->ignore(Auth::user()->id, 'id'), 'required', 'email'],
            'username' => [Rule::unique('users')->ignore(Auth::user()->id, 'id'), 'required'],
            'name' => 'required',
            'surname' => 'required'
        ]);


        $user = User::where('id', Auth::user()->id)->first();
        $user->fill($request->all());
        $user->save();

        return redirect('profile')->with('status', true);
    }
}

?>