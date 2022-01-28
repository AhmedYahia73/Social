<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LogoutController extends Controller
{
    public function logout(Request $req){
        $req->session()->forget('userID');
        $arr = array(
            'pageName' => 'Login',
            'styleName' => 'login'
        );
        return view("login",compact('arr'));
    }
}
