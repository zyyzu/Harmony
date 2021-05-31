<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserOwnProfile extends Controller
{
    function ownProfile(){
        $logedID = Auth::id();
        $friends = DB::table('friends')
        ->select('user1_id', 'user2_id')
        ->where('user1_id', $logedID)
        ->orWhere('user2_id', $logedID)
        ->get();
        $friendsIDs = array();
        foreach ($friends as $key => $friend) {
            if($friend->user1_id==$logedID){
                array_push($friendsIDs, $friend->user2_id);
            }
            else{
                array_push($friendsIDs, $friend->user1_id);
            }
        }
        $friendsToView = [];
        $dbresult = DB::table('users')
        ->select('first_name', 'last_name')
        ->whereIn('id', $friendsIDs)
        ->get();
        foreach ($dbresult as $key => $friend) {
            $friendsToView[] = [
                'first_name'=>$friend->first_name,
                'last_name'=>$friend->last_name
            ];
        }
       //dd(Storage::disk('defaults')->get('default_avatar.png'));
        //TODO avatars
        $profileUrl = DB::table('users')->select(['avatar_url'])->where('id', Auth::id())->first();

        return view("profile.main", [
            'userFirstName'=> Auth::user()->first_name,
            'userLastName'=> Auth::user()->last_name,
            'profile_picture' => ($profileUrl == null) ? Storage::disk('defaults')->url('default_avatar.png') : Storage::url($profileUrl->avatar_url),
            'friendsCount'=>count($friendsIDs),
            'friends'=>$friendsToView
        ]);
    }
}
