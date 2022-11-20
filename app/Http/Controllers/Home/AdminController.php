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
        $adminID = Auth::user()->id;
        $adminData = User::find($adminID);

        return view('admin.profile.index', compact('adminData'));

    }
}
