<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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
       // dd($friendsToView);
        return view("profile.main", [
            'userFirstName'=> Auth::user()->first_name,
            'userLastName'=> Auth::user()->last_name,
            'friendsCount'=>count($friendsIDs),
            'friends'=>$friendsToView
        ]);
    }
}
