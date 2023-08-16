<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()){
            $route = $this->load();
            return redirect($route);
        }
        return view('home.index');
    }

    public Function load()
    {
        $redirect = '';

        if(Auth::user() && Auth::user()->role_id == 1){
            $redirect = '/super-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role_id == 2){
            $redirect = '/sub-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role_id == 3){
            $redirect = '/admin/dashboard';
        }
        else{
            $redirect = '/dashboard';
        }

        return $redirect;
    }




}
