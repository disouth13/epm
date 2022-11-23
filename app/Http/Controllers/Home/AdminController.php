<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // method logout
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         // alert notification
         $notification = array(
            'message'       => 'Logout Success!',
            'alert-type'    => 'success'
        
        );

        return redirect('/login')->with($notification);
    }

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

        $notification = array(
            'message'       => 'Admin Profile Updated Success!',
            'alert-type'    => 'success'
        
        );

        return redirect()->route('admin-profile')->with($notification);
    }


    // method ChangePassword
    public function ChangePassword()
    {
        return view('admin.profile.change-password');
    }

    // method update password
    public function UpdatePassword(Request $request)
    {
        $validateDataUser = $request->validate([
            'oldpassword'       => 'required',
            'newpassword'       => 'required',
            'confirm_password'  => 'required|same:newpassword'
        ]);

        //conditional change password
        $hasPassword    = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hasPassword))
        {
            $users   = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            // session message
            session()->flash('message', 'Password Updated Success!');
            return redirect()->back();

        } else {
            session()->flash('message', 'Old Password is not match!');
            return redirect()->back();
        }
    }
}
