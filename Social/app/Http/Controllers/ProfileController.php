<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    //View Forms
    public function viewProfile(Request $req){
        $arr = array(
            'pageName' => 'Profile',
            'styleName' => 'profile'
        );
        if($req->session()->has('userID')){
        $userID = $req->session()->get('userID');
        $obj = Login::select("*")
        ->where('ID', '=', $userID)
        ->limit(1)
        ->get();
        return view('profile', compact('arr', 'obj'));
    }
    else{
        $text = "You Must Login First !!";
        return view('errors', compact('text', 'arr'));
    }
    }

    //__________________________________________________________________________________
    //Save Changes

    public function updateProfile(Request $req){
        $arr = array(
            'pageName' => 'Profile',
            'styleName' => 'profile'
        );
        if($req->session()->has('userID')){
        $userID = $req->session()->get('userID');

        //_________________________________________________________________________
        //Validation

        $text = '';
        $obj = Login::select("*")
        ->where('ID', '=', $userID)
        ->limit(1)
        ->get();
        foreach($req as $key => $val){
            if(empty($val)){
                $text = "You Must Fill ". $key . "Feild";
                $arr = array(
                    'pageName' => 'Errors',
                    'styleName' => ''
                );
                return view('errors', compact('arr', 'text'));
            }
        }
        $changePassword = true;
        $obj1 = Login::select("userName")
        ->where('userName', '=', $req['userName'])
        ->where('ID', '!=', $userID)
        ->limit(1)
        ->get();
        if(sha1($req['oldPassword']) != $obj[0]['password']){
            $text = "You Must Enter Your Password Right";
            $arr = array(
                'pageName' => 'Errors',
                'styleName' => ''
            );
            return view('errors', compact('arr', 'text'));
        }elseif(count($obj1)){
            $text = "UserName Exist You Should Write Another User";
            $arr = array(
                'pageName' => 'Errors',
                'styleName' => ''
            );
            return view('errors', compact('arr', 'text'));
        }elseif($req['newPassword'] < 9 ){
            if(empty($req['newPassword'])){
                $changePassword = false;
            }else{
            $text = "Passwor Must ". $key . "Feild";
            $arr = array(
                'pageName' => 'Errors',
                'styleName' => ''
            );
            return view('errors', compact('arr', 'text'));
            }
        }
        $userImg = '';
        $img = '';

        //________________________________________________________________________________
        //Get Picture
        if(!empty($_FILES['userImg']['name'])){
        $userImg = $_FILES['userImg'];
        $extensionArr = array('jpg', 'jpeg', 'png', 'gif', 'svg');
        $extension = explode('.', $userImg['name']);
        $extension = end($extension);
        $extension = strtolower($extension);
        if(!in_array($extension, $extensionArr)){
            $text = "You Must Select Image (jpg, jpeg, png, gif, svg)";
            $arr = array(
                'pageName' => 'Errors',
                'styleName' => ''
            );
            return view('errors', compact('arr', 'text'));
        }elseif(intval($userImg['size']) > 7500000){
            $text = "Image Must Be Smaller Than 7 MBs";
            $arr = array(
                'pageName' => 'Errors',
                'styleName' => ''
            );
            return view('errors', compact('arr', 'text'));
        }
        $img = $req['userName'] . rand(0,100000) . $userImg['name'];
        $img = str_replace('-', '', $img);
        move_uploaded_file($userImg['tmp_name'], "image\\". $img);
    }else{
        $img = $req['myImg'];
    }
        //________________________________________________________________________________
        //Update Changes
        if($changePassword){
        Login::where('ID', '=', $userID)
        ->update([
            'userName'  => $req['userName'],
            'password'  => sha1($req['newPassword']),
            'email'     => $req['email'],
            'phone'     => $req['phone'],
            'userImage' => $img,
        ]);
        $obj = array([
            'userName' => $req['userName'],
            'email' => $req['email'],
            'phone' => $req['phone'],
            'userImage' => $img,
        ]);
        return view('profile', compact('arr', 'obj'));
    }
        else{
            Login::where('ID', '=', $userID)
            ->update([
                'userName'  => $req['userName'],
                'email'     => $req['email'],
                'phone'     => $req['phone'],
                'userImage' => $img,
            ]);
            $obj = array([
                'userName' => $req['userName'],
                'email' => $req['email'],
                'phone' => $req['phone'],
                'userImage' => $img,
            ]);
            return view('profile', compact('arr', 'obj'));
        }
    }
        else{
            $text = "You Must Login First !!";
            return view('errors', compact('text', 'arr'));
        }
    }
}
