<?php

namespace App\Http\Controllers\Mht;

use Image;

use App\Models\Mu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MuController extends Controller
{
    public function IndexMu()
    {
        $muIndexGetData = Mu::latest()->get();
        return view('admin.mht.mu.index', compact('muIndexGetData'));
    } //end method

    public function AddMu()
    {
        return view('admin.mht.mu.add');
    } //end method

    public function StoreMu(Request $request)
    {
        // membuat validasi pada form
        $request->validate(
            [
                'photo'             => 'required',
                'area'              => 'required',
                'pic'               => 'required',
                'merek'             => 'required',
                'kondisi'           => 'required',
                'keterangan'        => 'required',
                'periode'           => 'required',
            ],

            [
                'photo.required'                => 'Silahkan Upload Foto!',
                'area.required'                 => 'Silahkan Pilih Area!',
                'pic.required'                  => 'Anda belum input PIC!',
                'merek.required'                => 'Silahkan Pilih Merek!',
                'kondisi.required'              => 'Silahkan Pilih Kondisi!',
                'keterangan.required'           => 'Silahkan Pilih Keterangan!',
                'periode.required'              => 'Silahkan Pilih Periode!',

            ],
        );

        // fungsi conditional
        if ($request->file('photo')) {
            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // image intervantion
            Image::make($image)->resize(474, 484)->save('upload/mht/mu/'.$name_generate);

            $saveUrl = 'upload/mht/mu/'.$name_generate;

        };


         // save data
        Mu::insert([
            'users_id'      => Auth::user()->id,
            'area'          => $request->area,
            'pic'           => $request->pic,
            'merek'         => $request->merek,
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

        return redirect()->route('index-mu')->with($notification);

    } //end method

    public function ViewMu($id)
    {
        $viewDataMu = Mu::findOrFail($id);
        return view('admin.mht.mu.view', compact('viewDataMu'));
    } //end method

    public function EditMu($id)
    {
        $ambilDataMu = Mu::findOrFail($id);
        return view('admin.mht.mu.edit', compact('ambilDataMu'));
    } //end method

    public function UpdateMu(Request $request)
    {
        $updateDataMuID = $request->id;

        // membuat validasi pada form
        $request->validate(
            [
                'photo'             => 'required',
                'area'              => 'required',
                'pic'               => 'required',
                'merek'             => 'required',
                'kondisi'           => 'required',
                'keterangan'        => 'required',
                'periode'           => 'required',
            ],

            [
                'photo.required'                => 'Silahkan Upload Foto!',
                'area.required'                 => 'Silahkan Pilih Area!',
                'pic.required'                  => 'Anda belum input PIC!',
                'merek.required'                => 'Silahkan Pilih Merek!',
                'kondisi.required'              => 'Silahkan Pilih Kondisi!',
                'keterangan.required'           => 'Silahkan Pilih Keterangan!',
                'periode.required'              => 'Silahkan Pilih Periode!',

            ],
        );

        // fungsi conditional
        if ($request->file('photo')) {

            $imageDel = Mu::findOrFail($updateDataMuID);
            unlink($imageDel->photo);


            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // image intervantion
            Image::make($image)->resize(474, 484)->save('upload/mht/mu/'.$name_generate);

            $saveUrl = 'upload/mht/mu/'.$name_generate;

        };


         // update data
        Mu::findOrFail($updateDataMuID)->update([

            // namadariDB      nmdariForm
            'users_id'      => Auth::user()->id,
            'area'          => $request->area,
            'pic'           => $request->pic,
            'merek'         => $request->merek,
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

        return redirect()->route('index-mu')->with($notification);
    
    } //end method


    public function DeleteMu($id)
    {
        $deleteMuID = Mu::findOrFail($id);
        $imageDelete = $deleteMuID->photo;
        unlink($imageDelete);

        Mu::findOrFail($id)->delete();
        $notification = array(
            'message'       => 'Data berhasil dihapus!',
            'alert-type'    => 'success',

        );

        return redirect()->back()->with($notification);

    }

}
