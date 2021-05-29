<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
       //dd(Storage::disk('defaults')->get('default_avatar.png'));
        //TODO avatars
        return view("profile.main", [
            'userFirstName'=> Auth::user()->first_name,
            'userLastName'=> Auth::user()->last_name,
            'profile_picture' => (Auth::user()->profile == null) ? Storage::disk('defaults')->url('default_avatar.png') : Auth::user()->profile,
            'friendsCount'=>count($friendsIDs),
            'friends'=>$friendsToView
        ]);
    }
    public function showEditForm(){

    }
    public function editProfile(Request $request){
        if(Auth::check()){
            $validated = $request->validate([
                'name' => ['required', 'min:1', 'max:30'],
                'surname' => ['required', 'min:1', 'max:30'],
                'profile_pic'=> ['dimensions:min_width=100,max_width=2048,min_height=100,max_height=2048'],
                'background_pic'=>['dimensions:min_width=425,max_width=850,min_height=157,max_height=315']
            ]);

        }

    }
}
