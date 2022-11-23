<?php

namespace App\Http\Controllers\Mht;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MhtController extends Controller
{
    //method AddPs
    public function AddPs()
    {

        

        return view('admin.mht.ps.add');
    }
}
