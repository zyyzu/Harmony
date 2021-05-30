<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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
        $profileUrl = DB::table('users')->select(['avatar_url'])->where('id', Auth::id())->first();

        return view("profile.main", [
            'userFirstName'=> Auth::user()->first_name,
            'userLastName'=> Auth::user()->last_name,
            'profile_picture' => ($profileUrl == null) ? Storage::disk('defaults')->url('default_avatar.png') : Storage::url($profileUrl->avatar_url),
            'friendsCount'=>count($friendsIDs),
            'friends'=>$friendsToView
        ]);
    }
    public function showEditForm(){
        return view("profile.editprofile", [
            'userFirstName'=> Auth::user()->first_name,
            'userLastName'=> Auth::user()->last_name,
        ]);
    }
    public function editProfile(Request $request){

        if(Auth::check()){
            $validated = $request->validate([
                'inputName' => ['required', 'min:1', 'max:30'],
                'inputLastName' => ['required', 'min:1', 'max:30'],
                'inputAvatar'=> ['dimensions:min_width=100,min_height=200', 'image'],
                'inputBackground'=>['dimensions:min_width=425,max_width=850,min_height=157,max_height=315', 'file', 'image']
            ]);

            if(isset($validated['inputAvatar'])){
                $avatarPath = $validated['inputAvatar']->store('User'.Auth::id(), 'public');
                DB::table('users')->where('id', Auth::id())->update(['avatar_url'=>$avatarPath]);
            }
            if(isset($validated['inputBackground'])){
                $backgroundPath = $validated['inputBackground']->store('User'.Auth::id(), 'public');
                DB::table('users')->where('id', Auth::id())->update(['background_url'=>$backgroundPath]);
            }


            DB::table('users')->where('id', '=', Auth::id())->update([
                'first_name'=>$validated['inputName'],
                'last_name'=>$validated['inputLastName']
            ]);
            return redirect(route('user.profile.own'));
        }

    }
}
