<?php

namespace App\Http\Controllers\AJAX;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SinglePostAjax extends Controller
{
    public function toggleLikeAjax(int $id, Request $request){
        if(!$request->ajax()){
            return response("ajax expected", 200, ['Content-Type'=>'text/plain']);
        }
        //TODO sprawdzenie czy obecna osoba moze polajkować dany post
        $postcheck = DB::table('posts')
        ->select('id')
        ->where('id', $id)
        ->get();


        if(count($postcheck)==0){
            $tojson = array(
                'status'=>0,
                'error'=>'Post with this ID do not exists'
            );
            return response(json_encode($tojson), 200, ['Content-Type'=>'text/json']);
        }
//check is arleady liked
        $likecheck = DB::table('likes')
        ->select('id')
        ->where('post_id', $id)
        ->where('user_id', Auth::id())
        ->get();

        $likes = DB::table('likes')
        ->where('post_id', $id)
        ->count();
        if(count($likecheck)==0){
            $tojson = array(
                'status'=>200,
                'error'=>'',
                'liked'=>1,
                'likes'=>($likes+1)
            );
            DB::table('likes')->insert([
                'post_id'=>$id,
                'user_id'=>Auth::id()
            ]);
            return response(json_encode($tojson), 200, ['Content-Type'=>'text/json']);
        }else{
            $tojson = array(
                'status'=>200,
                'error'=>'',
                'liked'=>0,
                'likes'=>($likes-1)
            );
            DB::table('likes')
            ->where('post_id', $id)
            ->where('user_id', Auth::id())
            ->delete();
            return response(json_encode($tojson), 200, ['Content-Type'=>'text/json']);
        }


    }
}
