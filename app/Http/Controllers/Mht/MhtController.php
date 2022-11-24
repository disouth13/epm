<?php

namespace App\Http\Controllers\Mht;

use App\Models\Psdc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

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

            ]
        );

         // simpan file gambar
         $filePhoto = $request->file('photo');
         $name_generate = hexdec(uniqid()).'.'.$filePhoto->getClientOriginalExtension();
 
         // resize file foto
         $save_url->save('upload/mht/psdc/'.$name_generate);
 
         // save url link file 
         $save_url = 'upload/mht/psdc/'.$name_generate;
 
         // save data ke database
         Psdc::insert([
 
             'area'        => $request->portfolio_name,
             'pic'       => $request->portfolio_title,
             'nmAlat'        => $request->portfolio_desc,
             'suhu'        => $request->portfolio_desc,
             'kondisi'        => $request->portfolio_desc,
             'keterangan'        => $request->portfolio_desc,
             'photo'       => $save_url,
             'tglPengecekan' => Carbon::now(),
             'periode' => Carbon::now()->format('M'),
             'created_at'            => Carbon::now(),
 
         ]);


        $notification = array(
            'message'       =>  'Data berhasil disimpan',
            'alert-type'    =>  'success'
        );

        return redirect()->route('index-psdc')->with($notification);
    }
}
