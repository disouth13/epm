<?php

namespace App\Http\Controllers\Ktp;

use Image;

use App\Models\Pfe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PfeKtpController extends Controller
{
    //method indexPfe Ktp
    public function IndexPfe()
    {
          //menampilkan data bulan dan tahun
        $month = carbon::now();
        $year = carbon::now();
        $pfeIndexGetData = Pfe::Join('users', 'users.id', '=', 'pfe.users_id')->Select('*', 'pfe.id AS pfe_id')->where('location', '=', 'Ketapang')->whereMonth('periode', '=', $month)->whereYear('periode', '=', $year)->latest('pfe.created_at')->get();

        // dd($pfeIndexGetData);
                                        
        return view('admin.ktp.pfe.index', compact('pfeIndexGetData'));
    } //end method

    // method addPfe Ktp
    public function AddPfe()
    {
        return view('admin.ktp.pfe.add');
    } //end method 

    // method storePFe Ktp
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
            Image::make($image)->resize(474, 484)->save('upload/ktp/pfe/'.$name_generate);

            $saveUrl = 'upload/ktp/pfe/'.$name_generate;

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

        return redirect()->route('index-pfe-ktp')->with($notification);

    } //end method storePfe

    // method viewPFe Ktp
    public function ViewPfe($id)
    {
        $viewDataPfe = Pfe::findOrFail($id);
        return view('admin.ktp.pfe.view', compact('viewDataPfe'));
    } //end method pfe ktp


    //method editPfe Ktp
    public function EditPfe($id)
    {
        $ambilDataPfe = Pfe::findOrFail($id);
        return view('admin.ktp.pfe.edit', compact('ambilDataPfe'));
    } //end method


    //method updatePfeKtp
    public function UpdatePfe(Request $request)
    {
        $updateDataPfeID = $request->id;


         //Membuat validasi form
        $request->validate(
            [
                'area'          => 'required',
                'pic'           => 'required',
                'type'          => 'required',
                'keterangan'    => 'required',
                
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

            $imageDel = Pfe::findOrFail($updateDataPfeID);
            unlink($imageDel->photo);

            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // image intervantion
            Image::make($image)->resize(474, 484)->save('upload/ktp/pfe/'.$name_generate);

            $saveUrl = 'upload/ktp/pfe/'.$name_generate;

            // update data
            Pfe::findOrFail($updateDataPfeID)->update([

            // namadariDB      nmdariForm
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
                'message'       =>  'Data berhasil di ubah',
                'alert-type'    =>  'success'
            );

            return redirect()->route('index-pfe-ktp')->with($notification);

        } else {

            // update data
        Pfe::findOrFail($updateDataPfeID)->update([

            // namadariDB      nmdariForm
            'users_id'      => Auth::user()->id,
            'area'          => $request->area,
            'pic'           => $request->pic,
            'type'          => $request->type,
            'keterangan'    => $request->keterangan,
            'kondisi'       => $request->kondisi,
            'periode'       => $request->periode,
            'created_at'     => Carbon::now(),
        ]);

        // notif message
        $notification = array(
            'message'       =>  'Data berhasil di ubah',
            'alert-type'    =>  'success'
        );

        return redirect()->route('index-pfe-ktp')->with($notification);

        };

        

    } //end method update pfe

    // Method DeletPfe kTp
    public function DeletePfe($id)
    {
        $deletePfeID = Pfe::findOrFail($id);
        $imageDelete = $deletePfeID->photo;
        unlink($imageDelete);

        Pfe::findOrFail($id)->delete();
        $notification = array(
            'message'       => 'Data berhasil dihapus!',
            'alert-type'    => 'success',

        );

        return redirect()->back()->with($notification);

    }





}
