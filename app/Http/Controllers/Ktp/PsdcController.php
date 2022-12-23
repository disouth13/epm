<?php

namespace App\Http\Controllers\Ktp;

use Image;
use App\Models\Psdc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class PsdcController extends Controller
{
    //method IndexPsdc
    public function IndexPsdc()
    {
        //menampilkan data bulan dan tahun
        $month = carbon::now();
        $year = carbon::now();
        $psdcIndexGetData = Psdc::join('users', 'users.id', '=', 'psdcs.users_id')->where('location', '=', 'Ketapang')->whereMonth('periode', '=', $month)
                                           ->whereYear('periode', '=', $year)->latest('psdcs.created_at')->get();

        return view('admin.ktp.psdc.index', compact('psdcIndexGetData'));

    } //end method


    // method addPsdcKtp
    public function AddPsdc()
    {
        return view('admin.ktp.psdc.add');
    } //end method

    //method function viwePSDC-ktp
    public function viewPsdc($id)
    {
        $viewPsdcData = Psdc::findOrFail($id);
        return view('admin.ktp.psdc.view', compact('viewPsdcData'));
    }//end method

    
    
}
