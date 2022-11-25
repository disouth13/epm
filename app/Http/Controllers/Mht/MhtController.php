<?php

namespace App\Http\Controllers\Mht;

use Image;
use App\Models\Psdc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MhtController extends Controller
{
    // method IndexPsdc
    public function IndexPsdc()
    {
        return view('admin.mht.psdc.index');
    }

    //method AddPs
    public function AddPsdc()
    {
        return view('admin.mht.psdc.add');
    }

    // method StorePsdc
    public function StorePsdc(Request $request)
    {
        // membuat validasi form
        $request->validate(
            [
                
                'area'          =>  'required',
                'pic'           =>  'required',
                'nmAlat'        =>  'required',
                'suhu'          =>  'required',
                'kondisi'       =>  'required',
                'keterangan'    =>  'required',

            ],

            
        );

         // simpan file gambar
         $image = $request->file('photo');
         
         $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
 
         // resize file foto
         Image::make($image)->save('upload/mht/psdc/'.$name_generate);
 
         // save url link file 
         $saveUrl = 'upload/mht/psdc/'.$name_generate;

 
         // save data ke database
         Psdc::insert([
             'users_id'     => Auth::user()->id,
             'area'        => $request->area,
             'pic'       => $request->pic, 
             'nmAlat'        => $request->nmAlat,
             'suhu'        => $request->suhu,
             'kondisi'        => $request->kondisi,
             'keterangan'       => $request->keterangan,
             'photo'       => $saveUrl,
             'periode' => Carbon::now(),
             'status' => 'Menunggu Persetujuan',
             'created_at'            => Carbon::now(),
 
         ]);


        $notification = array(
            'message'       =>  'Data berhasil disimpan',
            'alert-type'    =>  'success'
        );

        return redirect()->route('index-psdc')->with($notification);
    }
}
