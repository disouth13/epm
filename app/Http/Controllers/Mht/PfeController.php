<?php

namespace App\Http\Controllers\Mht;

use Image;

use App\Models\Pfe;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PfeController extends Controller
{
    //method indexPfe
    public function IndexPfe()
    {
        $pfeIndexGetData = Pfe::latest()->get();
        return view('admin.mht.pfe.index', compact('pfeIndexGetData'));
    } //end method pfe

    // method addPfe
    public function AddPfe()
    {
        return view('admin.mht.pfe.add');
    } // end method addpfe


    public function StorePfe(Request $request)
    {
        //Membuat validasi form
        $request->validate(
            [
                'area'          => 'required',
                'pic'           => 'required',
                'type'          => 'required',
                'keterangan'    => 'required',
                'photo'         => 'required',
                'kondisi'       => 'required',
                'periode'       => 'required',
            ],

            [
                'area.required'                 => 'Pilih data area!',
                'pic.required'                  => 'Data PIC belum diinputkan!',
                'type.required'                 => 'Pilih data type!',
                'keterangan.required'           => 'Pilih data keterangan!',
                'kondisi.required'              => 'Pilih data kondisi',
                'periode.required'              => 'Masukan tanggal periode pengecekan!',



            ],

        );

        // fungsi conditional
        if ($request->file('photo')) {
            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // image intervantion
            Image::make($image)->resize(474, 484)->save('upload/mht/pfe/'.$name_generate);

            $saveUrl = 'upload/mht/pfe/'.$name_generate;

        };


         // save data
         Pfe::insert([
            'users_id'      => Auth::user()->id,
            'area'          => $request->area,
            'pic'           => $request->pic,
            'type'          => $request->type,
            'keterangan'    => $request->keterangan,
            'kondisi'       => $request->kondisi,
            'periode'       => $request->periode,
            'photo'         => $saveUrl,
            'created_at'     => Carbon::now(),
        ]);

        // notif message
        $notification = array(
            'message'       =>  'Data berhasil disimpan',
            'alert-type'    =>  'success'
        );

        return redirect()->route('index-pfe')->with($notification);



    } //end method storePfe


    public function ViewPfe($id)
    {
        $viewDataPfe = Pfe::findOfFail($id);
        return view('admin.mht.pfe.view', compact('viewDataPfe'));
    }

}