<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(Request $req){
        $arr = array(
            'pageName' => 'About',
            'styleName' => 'about'
        );
        if($req->session()->has('userID')){
        return view("about",compact('arr'));
    }else{
        $text = "You Must Login First !!";
        return view('errors', compact('text', 'arr'));
    }
    }

    public function publicAbout(){
        $arr = array(
            'pageName' => 'About',
            'styleName' => 'about'
        );
        return view("publicAbout",compact('arr'));
    }
}
