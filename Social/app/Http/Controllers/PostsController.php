<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // Form Show
    public function posts(Request $req){
        $arr = array(
            'pageName' => 'Posts',
            'styleName' => 'posts'
        );
        if($req->session()->has('userID')){
        $success = '';
        return view("posts",compact('arr', 'success'));
    }else{
        $text = "You Must Login First !!";
        return view('errors', compact('text', 'arr'));
    }
    }

    // Publish
    public function publish(Request $req){
        $arr = array(
            'pageName' => 'Posts',
            'styleName' => 'posts'
        );
        if($req->session()->has('userID')){
        $userID = $req->session()->get('userID');
        $success = "You Are Published Your Article Success";
        Post::create([
            'body' => $req['body'],
            'date' => now(),
            'userID' => $userID,
            'type' => $req['type'],
            'title' => $req['title'],
        ]);
        return view("posts",compact('arr', 'success'));
    }else{
        $text = "You Must Login First !!";
        return view('errors', compact('text', 'arr'));
         }
    }

    //Delete Post
    public function del(Request $req){
        $arr = array(
            'pageName' => 'Home',
            'styleName' => 'home'
        );
        if($req->session()->has('userID')){
        $ID = $req->session()->get('userID');
        if($ID == $req['userID']){
        Post::where('userID', '=', $ID)
        ->where('ID', '=', $req['postID'])
        ->delete();
        
        
        $obj = Post::select("*", "post.ID AS postID", "post.date AS postDate", "user.ID AS userID")
        ->leftJoin('user', 'post.userID', '=', 'user.ID')
        ->leftJoin('rate', 'post.ID', '=', 'rate.postID')
        ->orderByDesc('post.ID')
        ->get()
        ;
        return view('home', compact('arr', 'obj', 'ID'));
        }
        else{
            $text = "You Can't Delete This Post This Post Doesn't Belong You";
            return view('errors', compact('text', 'arr'));
        }
    }
    else{
        $text = "You Must Login First";
        return view('errors', compact('text', 'arr'));
    }
    }


    //Delete Comment
    public function delComment(Request $req){
        $arr = array(
            'pageName' => 'Home',
            'styleName' => 'home'
        );
        if($req->session()->has('userID')){
        $ID = $req->session()->get('userID');
        if($ID == $req['userID']){
        Comment::where('userID', '=', $ID)
        ->where('ID', '=', $req['comID'])
        ->delete();
        
        
        $objComments = Comment::select("*", 'comment.date AS dateComment', 'post.ID AS postID', 'comment.ID AS comID', 'comment.userID AS myID')
        ->leftJoin('post', 'comment.postID', '=', 'post.ID')
        ->leftJoin('user', 'comment.userID', '=', 'user.ID')
        ->where("post.ID", "=", $req["postID"])
        ->get()
        ;
        return view("home",compact('arr', 'objComments', 'ID'));
        }
        else{
            $text = "You Can't Delete This Post This Post Doesn't Belong You";
            return view('errors', compact('text', 'arr'));
        }
    }
    else{
        $text = "You Must Login First";
        return view('errors', compact('text', 'arr'));
    }
    }

 //Update 
 public function updatePost(Request $req){
    if($req->session()->has('userID')){
    Post::where('ID' , $req['postID'])
    ->update(['title' => $req['title'],
              'body'  => $req['body'],
              'type'  => $req['type'],
              'date'  => now()
    ]);
}
else{
    $text = "You Must Login First";
    return view('errors', compact('text', 'arr'));
}

 }

}
