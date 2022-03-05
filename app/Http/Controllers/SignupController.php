<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class SignupController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index($locale = 'en')
    {
        App::setLocale($locale);
        $roles = Role::all();
        $genders = Gender::all();
        return view('auth.signup', ['roles'=>$roles, 'genders'=>$genders]);
    }

    public function signup(Request $request){
        $request->validate([
            'first_name' => 'required|alpha_num|string|max:25',
            'middle_name' => 'string|alpha_num|max:25|nullable',
            'last_name' => 'required|alpha_num|string|max:25',
            'gender' => 'required',
            'email' => 'required|email|unique:accounts',
            'role' => 'required|in:User,Admin',
            'password' => ['required','string', Password::min(8)->numbers()],
            'display_picture_link' => 'required|image'
        ]);

        $file = $request->file('display_picture_link');
        $pictureName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/pictures', $file, $pictureName);
        $picturePath = 'pictures/'.$pictureName;

        $genderId = Gender::where('gender_desc', $request->gender)->first()->id;
        $roleId = Role::where('role_desc', $request->role)->first()->id;


        Account::create([
            'account_id' => $request->email,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender_id' => $genderId,
            'email' => $request->email,
            'role_id' => $roleId,
            'password' => Hash::make($request->password),
            'display_picture_link' => $picturePath,
            'delete_flag' => 0
        ]);

        return redirect('/login');

    }

}
