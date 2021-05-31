<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEditProfileForm extends Controller
{
    public function showEditForm(){
        return view("profile.editprofile", [
            'userFirstName'=> Auth::user()->first_name,
            'userLastName'=> Auth::user()->last_name,
        ]);
    }
}
