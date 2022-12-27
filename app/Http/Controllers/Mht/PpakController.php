<?php

namespace App\Http\Controllers\Mht;

use Image;


use App\Models\Ppak;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PpakController extends Controller
{
    //Method indexPpak
    public function IndexPpak()
    {
        //menampilkan data bulan dan tahun ini
        $month = carbon::now();
        $year = carbon::now();

        $ppakIndexGetData = Ppak::Join('users', 'users.id', '=', 'ppaks.users_id')->Select('*', 'ppaks.id AS ppak_id')->where('location', '=', 'Manhattan')->whereMonth('periode', '=', $month)->whereYear('periode', '=', $year)->latest('ppaks.created_at')->get();
        
        return view('admin.mht.ppak.index', compact('ppakIndexGetData'));
    } //end method ppak

    // method PpakAdd
    public function AddPpak()
    {
        return view('admin.mht.ppak.add');
    } //end method

    public function StorePpak(Request $request)
    {
        // membuat validasi pada form
        $request->validate(
            [
                'photo'             => 'required',
                'area'              => 'required',
                'pic'               => 'required',
                'merek'             => 'required',
                'suhu'             => 'required',
                'kondisi'           => 'required',
                'keterangan'        => 'required',
                'periode'           => 'required',
            ],

            [
                'photo.required'                => 'Silahkan Upload Foto!',
                'area.required'                 => 'Silahkan Pilih Area!',
                'pic.required'                  => 'Anda belum input PIC!',
                'merek.required'                => 'Silahkan Pilih Merek!',
                'suhu.required'                 => 'Silahkan Pilih Suhu!',
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
            Image::make($image)->resize(474, 484)->save('upload/mht/ppak/'.$name_generate);

            $saveUrl = 'upload/mht/ppak/'.$name_generate;

        };


         // save data
        Ppak::insert([
            'users_id'      => Auth::user()->id,
            'area'          => $request->area,
            'pic'           => $request->pic,
            'merek'         => $request->merek,
            'suhu'          => $request->suhu,
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

        return redirect()->route('index-ppak')->with($notification);

    } //end method

    public function ViewPpak($id)
    {
        $viewDataPpak = Ppak::findOrFail($id);
        return view('admin.mht.ppak.view', compact('viewDataPpak'));
    } //end method

    public function EditPpak($id)
    {
        $ambilDataPpak = Ppak::findOrFail($id);
        return view('admin.mht.ppak.edit', compact('ambilDataPpak'));
    } //end method

    public function UpdatePpak(Request $request)
    {
        $updateDataPpakID = $request->id;

        // membuat validasi pada form
        $request->validate(
            [
                
                'area'              => 'required',
                'pic'               => 'required',
                'merek'             => 'required',
                'suhu'             => 'required',
                'kondisi'           => 'required',
                'keterangan'        => 'required',
                'periode'           => 'required',
            ],

            [
                
                'area.required'                 => 'Silahkan Pilih Area!',
                'pic.required'                  => 'Anda belum input PIC!',
                'merek.required'                => 'Silahkan Pilih Merek!',
                'suhu.required'                 => 'Silahkan Pilih Suhu!',
                'kondisi.required'              => 'Silahkan Pilih Kondisi!',
                'keterangan.required'           => 'Silahkan Pilih Keterangan!',
                'periode.required'              => 'Silahkan Pilih Periode!',

            ],
        );

        // fungsi conditional
        if ($request->file('photo')) {

            $imageDel = Ppak::findOrFail($updateDataPpakID);
            unlink($imageDel->photo);


            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // image intervantion
            Image::make($image)->resize(474, 484)->save('upload/mht/ppak/'.$name_generate);

            $saveUrl = 'upload/mht/ppak/'.$name_generate;

              // update data
        Ppak::findOrFail($updateDataPpakID)->update([

            // namadariDB      nmdariForm
            'users_id'      => Auth::user()->id,
            'area'          => $request->area,
            'pic'           => $request->pic,
            'merek'         => $request->merek,
            'suhu'          => $request->suhu,
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

        return redirect()->route('index-ppak')->with($notification);

        } else {

              // update data
        Ppak::findOrFail($updateDataPpakID)->update([

            // namadariDB      nmdariForm
            'users_id'      => Auth::user()->id,
            'area'          => $request->area,
            'pic'           => $request->pic,
            'merek'         => $request->merek,
            'suhu'          => $request->suhu,
            'keterangan'    => $request->keterangan,
            'kondisi'       => $request->kondisi,
            'periode'       => $request->periode,

            'created_at'     => Carbon::now(),
        ]);

        // notif message
        $notification = array(
            'message'       =>  'Data berhasil disimpan',
            'alert-type'    =>  'success'
        );

        return redirect()->route('index-ppak')->with($notification);
        };


    
    
    } //end method

    public function DeletePpak($id)
    {
        $deletePpakID = Ppak::findOrFail($id);
        $imageDelete = $deletePpakID->photo;
        unlink($imageDelete);

        Ppak::findOrFail($id)->delete();
        $notification = array(
            'message'       => 'Data berhasil dihapus!',
            'alert-type'    => 'success',

        );

        return redirect()->back()->with($notification);

    }



}
