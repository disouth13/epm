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
        $year = Carbon::now()->year;

        $psdcIndexGetData = Psdc::latest()->whereYear('created_at', '=', $year)->get();
        return view('admin.mht.psdc.index', compact('psdcIndexGetData'));
    }

    //method AddPs
    public function AddPsdc()
    {   
        
        return view('admin.mht.psdc.add');
    }

    // method viewPdsc
    public function viewPsdc($id)
    {   
        $viewPsdcData = Psdc::findOrFail($id);
        return view('admin.mht.psdc.view', compact('viewPsdcData'));
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
                'photo'         =>  'required',

            ],

            
        );

         // simpan file gambar
        $image = $request->file('photo');
        
        $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // resize file foto
        Image::make($image)->resize(518, 444)->save('upload/mht/psdc/'.$name_generate);

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
            'periode'   => $request->periode,
            'created_at'            => Carbon::now(),

        ]);


        $notification = array(
            'message'       =>  'Data berhasil disimpan',
            'alert-type'    =>  'success'
        );

        return redirect()->route('index-psdc')->with($notification);
    }

    public function EditPsdc($id)
    {
        $ambilDataPsdc = Psdc::findOrFail($id);
        return view('admin.mht.psdc.edit', compact('ambilDataPsdc'));
    }

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


        //fungsi conditional
        if ($request->file('photo')) {

            $imageDel = Psdc::findOrFail($updatePsdcID);
            unlink($imageDel->photo);

            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // image intervantion
            Image::make($image)->resize(518, 444)->save('upload/mht/psdc/'.$name_generate);

            $saveUrl = 'upload/mht/psdc/'.$name_generate;

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

            $notification = array(
                'message'           => 'Data berhasil di ubah!!',
                'alert-type'        => 'success',
            );

            return redirect()->route('index-psdc')->with($notification);
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

            return redirect()->route('index-psdc')->with($notification);
        };
    }

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
