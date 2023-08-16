<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function redirectDash()
    {
        $redirect = '';

        if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/super-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 2){
            $redirect = '/sub-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 3){
            $redirect = '/admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 4){
            $redirect = '/admin/dashboard';
        }
        else{
            $redirect = '/dashboard';
        }

        return $redirect;
    }
}
