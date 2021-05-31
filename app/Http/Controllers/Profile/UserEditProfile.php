<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserEditProfile extends Controller
{
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
