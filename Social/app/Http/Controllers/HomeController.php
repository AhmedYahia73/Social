<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Login;
use App\Models\Post;
use App\Models\Rate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    //Show Articles
    
    public function home(Request $req){
        $arr = array(
            'pageName' => 'Home',
            'styleName' => 'home'
        );
        if($req->session()->has('userID')){
        $ID = $req->session()->get('userID');
        if(isset($_GET['type'])){
            $obj = Post::select("*", "post.ID AS postID", "post.date AS postDate", "user.ID AS userID")
            ->leftJoin('user', 'post.userID', '=', 'user.ID')
            ->leftJoin('rate', 'post.ID', '=', 'rate.postID')
            ->where('post.type', '=', $_GET['type'])
            ->orderByDesc('post.ID')
            ->get()
            ;
        }else{
        $obj = Post::select("*", "post.ID AS postID", "post.date AS postDate", "user.ID AS userID")
        ->leftJoin('user', 'post.userID', '=', 'user.ID')
        ->leftJoin('rate', 'post.ID', '=', 'rate.postID')
        ->orderByDesc('post.ID')
        ->get()
        ;
    }
    return view("home",compact('arr', 'obj', 'ID'));

        }

        //__________________________________________________________________________________________
        //Show Articles For Public
        else{
            $arr = array(
                'pageName' => 'Home',
                'styleName' => 'home'
            );
            if(isset($_GET['type'])){
                $obj = Post::select("*", "post.ID AS postID", "post.date AS postDate", "user.ID AS userID")
                ->leftJoin('user', 'post.userID', '=', 'user.ID')
                ->leftJoin('rate', 'post.ID', '=', 'rate.postID')
                ->where('post.type', '=', $_GET['type'])
                ->orderByDesc('post.ID')
                ->get()
                ;
            }else{
            $obj = Post::select("*", "post.ID AS postID", "post.date AS postDate", "user.ID AS userID")
            ->leftJoin('user', 'post.userID', '=', 'user.ID')
            ->leftJoin('rate', 'post.ID', '=', 'rate.postID')
            ->orderByDesc('post.ID')
            ->get()
            ;
        }
        $ID = empty($ID) ? '' : $ID;
        return view("publicHome",compact('arr', 'obj', 'ID'));
        }
}

//__________________________________________________________________________________________
// Show Comments

public function showComments(Request $req){
    $arr = array(
        'pageName' => 'Home',
        'styleName' => 'home'
    );
    if($req->session()->has('userID')){
    $ID = $req->session()->get('userID');
    //Publish Comments

    if(isset($req['myComment'])){
    $userID = $req->session()->get('userID');
     Comment::create([
        'comment' => $req['myComment'] ,
        'date'    => now() ,
        'userID'  => $userID ,
        'postID'  => $req["postID"] ,
     ]);
    }

    //Show Comments

    $objComments = Comment::select("*", 'comment.date AS dateComment', 'post.ID AS postID', 'comment.ID AS comID', 'comment.userID AS myID')
    ->leftJoin('post', 'comment.postID', '=', 'post.ID')
    ->leftJoin('user', 'comment.userID', '=', 'user.ID')
    ->where("post.ID", "=", $req["postID"])
    ->get()
    ;
    return view("home",compact('arr', 'objComments', 'ID'));
}else{
    $text = "You Must Login First !!";
    return view('errors', compact('text', 'arr'));
}
}

}
