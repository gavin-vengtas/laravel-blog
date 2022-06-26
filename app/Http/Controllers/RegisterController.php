<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store()
    {
        //validate POST data
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username', //['required','max:255','min:3',Rule::unique('users','username')]
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        //create user
        $user = User::create($attributes);

        //login user
        auth()->login($user);

        return redirect('/')->with('success','Your account has been created!'); // session()->flash('success','Your account has been created!');

    }
}
