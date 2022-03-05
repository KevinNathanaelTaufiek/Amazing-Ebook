<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['accountMaintenance', 'updateAccountMaintenance', 'softDeleteAccount', 'updateAccountRole']);
    }

    public function index($locale = 'en'){
        App::setLocale($locale);

        $account = Auth::user();
        $roles = Role::all();
        $genders = Gender::all();

        session()->put('_old_input', $account);
        return view('account.profile', ['roles' => $roles, 'genders' => $genders]);
    }

    public function accountMaintenance($locale = 'en')
    {
        App::setLocale($locale);
        $accounts = Account::where('delete_flag','LIKE','0')->get();
        return view('account.account-maintenance', ['accounts' => $accounts]);
    }

    public function updateAccountMaintenance($id, $locale = 'en')
    {
        App::setLocale($locale);
        $account = Account::find($id);
        $roles = Role::all();
        return view('account.account-update', ['account' => $account, 'roles'=>$roles]);
    }

    public function softDeleteAccount($id){

        if (Auth::user()->account_id == $id) {
            return redirect('/account-maintenance')->withErrors(__('customError.selfDelete'));
        }

        $account = Account::find($id);
        $account->delete_flag = 1;
        $account->modified_at = date("Y-m-d H:i:s");
        $account->modified_by = Auth::user()->account_id;
        $account->save();

        return redirect('/account-maintenance');
    }

    public function updateAccountRole(Request $request, $id){
        $account = Account::find($id);
        $roleId = Role::where('role_desc', $request->role)->first()->id;
        $account->role_id = $roleId;
        $account->modified_at = date("Y-m-d H:i:s");
        $account->modified_by = Auth::user()->account_id;
        $account->save();

        return redirect('/account-maintenance');
    }

    public function update(Request $request, $id, $locale = 'en')
    {
        App::setLocale($locale);

        $account = Account::find($id);

        if($request->email != $account->email && Account::find($request->email)){
            return back()->withErrors(__('validation.unique', ['attribute' => 'email']));
        }

        $updatedData = $request->validate([
            'first_name' => 'required|alpha_num|string|max:25',
            'middle_name' => 'string|alpha_num|max:25|nullable',
            'last_name' => 'required|alpha_num|string|max:25',
            'gender' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:User,Admin',
            'password' => ['required', 'string', Password::min(8)->numbers()],
            'display_picture_link' => 'required|image'
        ]);

        $file = $request->file('display_picture_link');
        $pictureName = time() . '_' . $file->getClientOriginalName();

        Storage::putFileAs('public/pictures', $file, $pictureName);
        $picturePath = 'pictures/' . $pictureName;


        if($account->display_picture_link != 'default.png'){
            Storage::delete('public/'.$account->display_picture_link);
        }

        $updatedData['display_picture_link'] = $picturePath;

        $genderId = Gender::where('gender_desc', $request->gender)->first()->id;
        $roleId = Role::where('role_desc', $request->role)->first()->id;

        $updatedData['gender_id'] = $genderId;
        $updatedData['role_id'] = $roleId;
        $updatedData['password'] = Hash::make($request->password);
        $updatedData['modified_at'] = date("Y-m-d H:i:s");
        $updatedData['modified_by'] = Auth::user()->account_id;


        $account->update($updatedData);

        return view('partials.saved');
    }
}
