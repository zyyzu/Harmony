<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class PostController extends Controller
{
    public function createPost(Request $request){
        if(Auth::check()){
            //content validation
            $validated = $request->validate([
                'post_content' => ['required', 'min:1', 'max:1000'],
                'post_submit' => ['accepted']
            ]);
            //insert to database
            $post = [
                'id' => null,
                'content' => $request->post_content,
                'author' => Auth::id(),
                'visibility' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('posts')->insert($post);
        }
        redirect(route('user.wall'));
    }
}
