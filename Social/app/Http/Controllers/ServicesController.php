<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services(Request $req){
        $arr = array(
            'pageName' => 'Services',
            'styleName' => 'about'
        );
        if($req->session()->has('userID')){
        return view("services",compact('arr'));
    }else{
        $text = "You Must Login First !!";
        return view('errors', compact('text', 'arr'));
         }
    }

    public function publicServices(){
        $arr = array(
            'pageName' => 'Services',
            'styleName' => 'about'
        );
        return view("publicServices",compact('arr'));
    }
}
