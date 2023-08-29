<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $userInfo = $request->validate([
         'name' =>  ['required', Rule::unique('users','name')],
         'email' => ['required', Rule::unique('users','name')],
         'password' => 'required'
        ]);
        $userInfo['password'] = bcrypt($userInfo['password']);
        $newUser = User::create($userInfo);
        auth()->login($newUser);

        return redirect('/');
    }

    public function login(Request $request){
      $loginInfo = $request->validate([
        'username' => 'required',
        'password' => 'required'
      ]);

      if(auth()->attempt(['name' => $loginInfo['username'], 'password' => $loginInfo['password']])){
       $request->session()->regenerate();
      }
      return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
