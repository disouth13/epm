<?php

namespace App\Http\Controllers\Ktp;

use Image;

use App\Models\Mu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class MuKtpController extends Controller
{
    //method IndexMuKtp
    public function IndexMu()
    {
        //menampilkan data bulan dan tahun
        $month = carbon::now();
        $year = carbon::now();
        $muIndexGetData = Mu::join('users', 'users.id', '=', 'mus.users_id')->Select('*', 'mus.id AS mus_id')->where('location', '=', 'Ketapang')->whereMonth('periode', '=', $month)
                                        ->whereYear('periode', '=', $year)->latest('mus.created_at')->get();
                                        
        return view('admin.ktp.mu.index', compact('muIndexGetData'));
    } //end method

    // method AddMuKtp
    public function AddMu()
    {
        return view('admin.ktp.mu.add');
    } //end method

    //method MU store ktp
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
            Image::make($image)->resize(474, 484)->save('upload/ktp/mu/'.$name_generate);

            $saveUrl = 'upload/ktp/mu/'.$name_generate;

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

        return redirect()->route('index-mu-ktp')->with($notification);
    
    } //end method store

    // method viewMu Ktp
    public function ViewMu($id)
    {
        $viewDataMu = Mu::findOrFail($id);
        return view('admin.ktp.mu.view', compact('viewDataMu'));
    } //end method

    // method EditMu Ktp
    public function EditMu($id)
    {
        $ambilDataMu = Mu::findOrFail($id);
        return view('admin.ktp.mu.edit', compact('ambilDataMu'));
    } //end method

    // method updateMu Ktp
    public function UpdateMu(Request $request)
    {
        $updateDataMuID = $request->id;

        // membuat validasi pada form
        $request->validate(
            [
                
                'area'              => 'required',
                'pic'               => 'required',
                'merek'             => 'required',
                'kondisi'           => 'required',
                'keterangan'        => 'required',
                'periode'           => 'required',
            ],

            [
                
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
            Image::make($image)->resize(474, 484)->save('upload/ktp/mu/'.$name_generate);

            $saveUrl = 'upload/ktp/mu/'.$name_generate;

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

            return redirect()->route('index-mu-ktp')->with($notification);

        } else{
            
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
                'created_at'     => Carbon::now(),
            ]);

            // notif message
            $notification = array(
                'message'       =>  'Data berhasil disimpan',
                'alert-type'    =>  'success'
            );

            return redirect()->route('index-mu-ktp')->with($notification);

        };

    } //end method updateMu Ktp


    // method delete Mu Ktp
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

    } //end method delete mu Ktp
    

}
