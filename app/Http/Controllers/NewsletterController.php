<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;
use Exception;
use GuzzleHttp\Exception\ClientException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            ddd($e->getResponse()->getBody()->getContents());
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
    
        return redirect('/')->with('success','You are signed up for our newsletter!');
    }
}
