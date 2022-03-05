<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function index($locale = 'en')
    {
        App::setLocale($locale);
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $account = Account::find($credentials['email']);
        if($account){
            if ($account->delete_flag == 1) {
                return back()->withErrors(__('customError.alreadyDeleted', ['attribute' => __('account.account')]))->withInput($credentials);
            }
        }

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }

        return back()->withErrors(__('customError.wrongCredential'))->withInput($credentials);
    }

    public function logout($locale = 'en')
    {
        App::setLocale($locale);
        Auth::logout();
        session()->put('_old_input', []);
        return view('index', ['message' => __('auth.logoutSuccess')]);
    }

}
