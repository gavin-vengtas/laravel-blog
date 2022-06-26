<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {   
        $user_name = 'Goodbye '.auth()->user()->name.', hope to see you soon!';
        Auth::logout();

        return redirect('/')->with('success',$user_name);
    }

    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|max:255',
            'password'=>'required|min:7',
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'welcome Back '.auth()->user()->name.'!');
        } 

        //auth failed
        ValidationException::withMessages(['email'=>'Your provided credentials could not be verified.']);

        // Alternative:

        // return back()
        //     ->withInput()
        //     ->withErrors(['email'=>'Your provided credentials could not be verified.']);

    }
}
