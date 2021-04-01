<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        if(Auth::user()->role === 'admin')
        {
            return $request->user()->hasVerifiedEmail()
                        ? redirect()->intended(RouteServiceProvider::ADMIN_HOME)
                        : view('auth.verify-email');
        } else {
            return $request->user()->hasVerifiedEmail()
                        ? redirect()->intended(RouteServiceProvider::USER_HOME)
                        : view('auth.verify-email');
        }
    }
}
