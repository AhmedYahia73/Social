<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Post;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Form of Login
    public function loginView(){
        $arr = array(
            'pageName' => 'Login',
            'styleName' => 'login'
        );
        return view('login', compact('arr'));
    }

    //Form of Register
    public function registerView(){
        $arr = array(
            'pageName' => 'Register',
            'styleName' => 'login'
        );
        return view('register', compact('arr'));
    }

    //Process of Login
    public function login(Request $req){
        $arr = array(
            'pageName' => 'Home',
            'styleName' => 'home'
        );
        $user = Login::select("*")
        ->where('userName', '=', $req['userName'])
        ->where('password', '=', sha1($req['password']))
        ->limit(1)
        ->get();
        if(count($user)==1){
            $req->session()->put('userID', $user[0]['ID']);
            $ID = $user[0]['ID'];
            if(isset($_GET['type'])){
            $obj = Post::select("*", "post.ID AS postID", "post.date AS postDate", "user.ID AS userID")
            ->leftJoin('user', 'post.userID', '=', 'user.ID')
            ->leftJoin('rate', 'post.ID', '=', 'rate.postID')
            ->where('post.type', '=', $_GET['type'])
            ->orderByDesc('post.ID')
            ->get()
            ;
            }
            else{
                $obj = Post::select("*", "post.ID AS postID", "post.date AS postDate", "user.ID AS userID")
                ->leftJoin('user', 'post.userID', '=', 'user.ID')
                ->leftJoin('rate', 'post.ID', '=', 'rate.postID')
                ->orderByDesc('post.ID')
                ->get()
                ;
            }
            return view('home', compact('arr', 'obj', 'ID'));
        }
        else{
            $arr = array(
                'pageName' => 'Errors',
                'styleName' => ''
            );
            $text = 'UserName or Password Is Wrong';
            return view('errors', compact('arr', 'text'));
        }
    }

    //Process of Register
    public function register(Request $req){
        $obj1 = Login::select("*")
        ->where('userName', '=', $req['userName'])
        ->limit(1)
        ->get()
        ;
        $text = $req['password1'] == $req['password2'] ? null : "You Must Enter Right Password In Confirm";
        $text = count($obj1) == 0 ? null : "User Name Is Existing You Must Change It";
        
        $arr = array(
            'pageName' => 'Home',
            'styleName' => 'home'
        );
            if(empty($text)){
            $obj = Post::select("*", "post.ID AS postID", "post.date AS postDate", "user.ID AS userID")
            ->leftJoin('user', 'post.userID', '=', 'user.ID')
            ->leftJoin('rate', 'post.ID', '=', 'rate.postID')
            ->orderByDesc('post.ID')
            ->get()
            ;
        $data = Login::create(
            [
                'userName' => $req['userName'],
                'password' => sha1($req['password1']),
                'email'    => $req['email'],
                'phone'    => $req['phone'],
                'date'     => now(),
            ]);
            $ID = $data->id;
            $req->session()->put('userID', $ID);
            return view('home', compact('arr', 'obj', 'ID'));
        }
        else{
            return view('errors', compact('text', 'arr'));
        }
    }
}
