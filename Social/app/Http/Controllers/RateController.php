<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller
{
    public function rate(Request $req){
        if($req['rateVal'] == 'insert'){
            Rate::create([
                'userID' => $req['userID'],
                'postID' => $req['postID'],
                'rate'   => $req['rate'],
            ]);
        }elseif($req['rateVal'] == 'true'){
            if($req['rate'] == 1){
                Rate::where('userID', $req['userID'])
                ->where('postID', $req['postID'])
                ->delete();
            }else{
                Rate::where('userID', $req['userID'])
                ->where('postID', $req['postID'])
                ->update([
                    'rate' => 0
                ]);
            }

        }elseif($req['rateVal'] == 'false'){
            if($req['rate'] == 0){
                Rate::where('userID', $req['userID'])
                ->where('postID', $req['postID'])
                ->delete();
            }else{
                Rate::where('userID', $req['userID'])
                ->where('postID', $req['postID'])
                ->update([
                    'rate' => 1
                ]);
            }
        }
    }
}
