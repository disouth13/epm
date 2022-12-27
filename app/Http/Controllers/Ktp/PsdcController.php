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
        $psdcIndexGetData = Psdc::join('users', 'users.id', '=', 'psdcs.users_id')->Select('*', 'psdcs.id AS psdcs_id')->where('location', '=', 'Ketapang')->whereMonth('periode', '=', $month)
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

    Public function StorePsdc(Request $request)
    {
        //membuat validasi form
        $request->validate(
            [
                
                'area'          =>  'required',
                'pic'           =>  'required',
                'nmAlat'        =>  'required',
                'suhu'          =>  'required',
                'kondisi'       =>  'required',
                'keterangan'    =>  'required',
                'photo'         =>  'required',

            ],

            
        );

        // simpan file gambar
        $image = $request->file('photo');

        $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // resize file foto
        Image::make($image)->resize(518, 444)->save('upload/ktp/psdc/'.$name_generate);

        // save url link file
        $saveUrl = 'upload/ktp/psdc/'.$name_generate;

        // save data ke database
        Psdc::insert([
            'users_id'              => Auth::user()->id,
            'area'                  => $request->area,
            'pic'                   => $request->pic,
            'nmAlat'                => $request->nmAlat,
            'suhu'                  => $request->suhu,
            'kondisi'               => $request->kondisi,
            'keterangan'            => $request->keterangan,
            'photo'                 => $saveUrl,
            'periode'               => $request->periode,
            'created_at'            => Carbon::now(),

        ]);


        // message notif
        $notification = array(
            'message'       =>  'Data berhasil disimpan',
            'alert-type'    =>  'success'
        );

        return redirect()->route('index-psdc-ktp')->with($notification);

    } //end method store psdc

    // method edit psdc
    public function EditPsdc($id)
    {
        $ambilDataPsdc = Psdc::findOrFail($id);
        return view('admin.ktp.psdc.edit', compact('ambilDataPsdc'));

    } //end edit psdc
    
    // updatepsdc ktp
    public function UpdatePsdc(Request $request)
    {
        $updatePsdcID = $request->id;

        // validasi form
        $request->validate(
            [   
                'area'                  => 'required',
                'nmAlat'                => 'required',        
                'pic'                   => 'required',        
                'suhu'                  => 'required',        
                'kondisi'               => 'required',        
                'keterangan'            => 'required',        
                'periode'               => 'required',        
            ],

            [
                'area.required'         => 'Data area belum Pilih',
                'nmAlat.required'       => 'Nama Alat tidak ditemukan',
                'pic.required'          => 'Data Pic tidak ditemukan',
                'suhu.required'         => 'Data Suhu tidak ditemukan',
                'kondisi.required'      => 'Data Kondisi tidak ditemukan',
                'periode.required'      => 'Tanggal Periode tidak ditemukan'                  
            ],

        );

        // funcsi conditional save image
        if ($request->file('photo')) {
            $imageDel = Psdc::findOrFail($updatePsdcID);
            unlink($imageDel->photo);

            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // image intervantion
            Image::make($image)->resize(518,444)->save('upload/ktp/psdc/'.$name_generate);

            $saveUrl = 'upload/ktp/psdc/'.$name_generate;

            Psdc::findOrFail($updatePsdcID)->update([
                 // nama dari database               nama dari form
                'users_id'          => Auth::user()->id,
                'area'              => $request->area,
                'nmAlat'            => $request->nmAlat,
                'pic'               => $request->pic,
                'suhu'              => $request->suhu,
                'kondisi'           => $request->kondisi,
                'keterangan'        => $request->keterangan,
                'photo'             => $saveUrl,
                'periode'           => $request->periode,
            ]);

            // notification
            $notification = array(
                'message'           => 'Data berhasil di ubah!!',
                'alert-type'        => 'success',
            );

            return redirect()->route('index-psdc-ktp')->with($notification);
        } else {
            Psdc::findOrFail($updatePsdcID)->update([
                // nama dari database               nama dari form
                'users_id'          => Auth::user()->id,
                'area'              => $request->area,
                'nmAlat'            => $request->nmAlat,
                'pic'               => $request->pic,
                'suhu'              => $request->suhu,
                'kondisi'           => $request->kondisi,
                'keterangan'        => $request->keterangan,
                'periode'           => $request->periode,
            ]);

            $notification = array(
                'message'           => 'Data berhasil di ubah!!',
                'alert-type'        => 'success',
            );

            return redirect()->route('index-psdc-ktp')->with($notification);
        };

    } //end method update psdc ktp

    public function DeletePsdc($id)
    {
        $deletePsdcID = Psdc::findOrFail($id);
        $imgDelete = $deletePsdcID->photo;
        unlink($imgDelete);

        Psdc::findOrFail($id)->delete();

        $notification = array(
            'message'       =>  'Data berhasil dihapus!',
            'alert-type'    =>  'success',

        );

        return redirect()->back()->with($notification);
    }
}
