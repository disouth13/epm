<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //method profile
    public function Profile()
    {
        $userID = Auth::user()->id;
        $userData = User::find($userID);

        return view('admin.profile.index', compact('userData'));

    }

    // method EditProfile
    public function EditProfile()
    {
        $userID = Auth::user()->id;
        $editUserData = User::find($userID);

        return view('admin.profile.edit-profile', compact('editUserData'));
    }

    // method StoreProfile
    public function StoreProfile(Request $request)
    {   
        $userID = Auth::user()->id;
        $storeUserData = User::find($userID);

        // name dari database               name dari form attribut
        $storeUserData->name                = $request->name;
        $storeUserData->username            = $request->username; 
        $storeUserData->email               = $request->email;
        $storeUserData->location            = $request->location;
        
        // simpan foto pada folder public
        if($request->file('image_user')) {
            $file = $request->file('image_user');

            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/user'),$filename);
            $storeUserData['image_user'] = $filename;
        }

        $storeUserData->save();

        return redirect()->route('admin-profile');
    }


    // method ChangePassword
    public function ChangePassword()
    {
        return view('admin.profile.change-password');
    }
}
