<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

        public function dashboard(){
        return view('users.admin.dashboard');
    }

}
