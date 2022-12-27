<?php

namespace App\Http\Controllers\Ktp;

use Image;
use App\Models\Prs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrsKtpController extends Controller
{
    //method indexPRS Ktp
    public function IndexPrs()
    {
        //menampilkan data bulan dan tahun
        $month = carbon::now();
        $year = carbon::now();
        $prsIndexGetData = Prs::join('users', 'users.id', '=', 'prs.users_id')->Select('*', 'prs.id AS prs_id')->where('location', '=', 'Ketapang')->whereMonth('periode', '=', $month)
                                        ->whereYear('periode', '=', $year)->latest('prs.created_at')->get();
        return view('admin.ktp.prs.index', compact('prsIndexGetData'));
    } //end method

    // method AddPrs ktp
    public function AddPrs()
    {
        return view('admin.ktp.prs.add');
    } //end method

    //method ViewPrs Ktp
    public function ViewPrs($id)
    {
        $viewDataPrs = Prs::findOrFail($id);
        return view('admin.ktp.prs.view', compact('viewDataPrs'));
    } //end method

    //method StorePrs ktp
    public function StorePrs(Request $request)
    {
        //Membuat validasi form
        $request->validate(
            [
                'area'          => 'required',
                'pic'           => 'required',
                'keterangan'    => 'required',
                'periode'       => 'required',
                'photoBefore'   => 'required',
                'photoAfter'    => 'required',
            ],

        );

        // fungsi conditional
        if ($request->file('photoBefore')) {
            $imageBefore = $request->file('photoBefore');
            $name_generate = hexdec(uniqid()).'.'.$imageBefore->getClientOriginalExtension();

            // image intervantion
            Image::make($imageBefore)->resize(474, 484)->save('upload/ktp/prs/before/'.$name_generate);

            $saveUrlBefore = 'upload/ktp/prs/before/'.$name_generate;

        };
        
        if ($request->file('photoAfter')) {
            $imageAfter = $request->file('photoAfter');
            $name_generate = hexdec(uniqid()).'.'.$imageAfter->getClientOriginalExtension();

            // image intervantion
            Image::make($imageAfter)->resize(474, 484)->save('upload/ktp/prs/after/'.$name_generate);

            $saveUrlAfter = 'upload/ktp/prs/after/'.$name_generate;


            // save data
            Prs::insert([
                'users_id'      => Auth::user()->id,
                'area'          => $request->area,
                'pic'           => $request->pic,
                'keterangan'    => $request->keterangan,
                'periode'       => $request->periode,
                'photoBefore'   => $saveUrlBefore,
                'photoAfter'    => $saveUrlAfter,
                'created_at'     => Carbon::now(),
            ]);

            // notif message
            $notification = array(
                'message'       =>  'Data berhasil disimpan',
                'alert-type'    =>  'success'
            );
    
            return redirect()->route('index-prs-ktp')->with($notification);


        };

    } //end method

    //method EditPRS Ktp
    public function EditPrs($id)
    {
        $ambilDataPrs = Prs::findOrFail($id);

        return view('admin.ktp.prs.edit', compact('ambilDataPrs'));
    } //end method


    //method updatePRS ktp
    public function UpdatePrs(Request $request)
    {
        $updateDataPrsID = $request->id;
        // validasi form
        $request->validate(
            [   
                'photoBefore'               => 'required',
                'photoAfter'                => 'required',
                'area'                      => 'required',
                'pic'                       => 'required',
                'keterangan'                => 'required',
                'periode'                   => 'required',
            
            ],

            [
        
                'photoBefore.required'          => 'Foto Berfore belum di upload',
                'photoAfter.required'           => 'Foto After belum di upload',
                'area.required'                 => 'Data area belum Pilih',
                'pic.required'                  => 'Data Pic tidak ditemukan',
                'keterangan.required'           => 'Data keterangan belum di pilih',
                'periode.required'              => 'Tanggal Periode tidak ditemukan'  
            ]
        );



        // fungsi conditional
        if ($request->file('photoBefore')) {

            $imageDelBefore = Prs::findOrFail($updateDataPrsID);
            unlink($imageDelBefore->photoBefore);

            $imageBefore = $request->file('photoBefore');
            $name_generate = hexdec(uniqid()).'.'.$imageBefore->getClientOriginalExtension();

            // image intervantion
            Image::make($imageBefore)->resize(474, 484)->save('upload/ktp/prs/before/'.$name_generate);

            $saveUrlBefore = 'upload/ktp/prs/before/'.$name_generate;

        };
        
        if ($request->file('photoAfter')) {
        
            $imageDelAfter = Prs::findOrFail($updateDataPrsID);
            unlink($imageDelAfter->photoAfter);

            $imageAfter = $request->file('photoAfter');
            $name_generate = hexdec(uniqid()).'.'.$imageAfter->getClientOriginalExtension();

            // image intervantion
            Image::make($imageAfter)->resize(474, 484)->save('upload/ktp/prs/after/'.$name_generate);

            $saveUrlAfter = 'upload/ktp/prs/after/'.$name_generate;


            // update data
            Prs::findOrFail($updateDataPrsID)->update([

                // namadariDB      nmdariForm
                'users_id'      => Auth::user()->id,
                'area'          => $request->area,
                'pic'           => $request->pic,
                'keterangan'    => $request->keterangan,
                'periode'       => $request->periode,
                'photoBefore'   => $saveUrlBefore,
                'photoAfter'   => $saveUrlAfter,
                
                'created_at'     => Carbon::now(),
            ]);

            // notif message
            $notification = array(
                'message'       =>  'Data berhasil di ubah',
                'alert-type'    =>  'success'
            );
    
            return redirect()->route('index-prs-ktp')->with($notification);


        };
        
        
    } //end method


    //method deletePRS ktp
    public function DeletePrs($id)
    {

        $deletePrsID = Prs::findOrFail($id);
        $imgDeleteBefore = $deletePrsID->photoBefore;
        unlink($imgDeleteBefore);

      
        $imgDeleteAfter = $deletePrsID->photoAfter;
        unlink($imgDeleteAfter);

        Prs::findOrFail($id)->delete();

        $notification = array(
            'message'       =>  'Data berhasil dihapus!',
            'alert-type'    =>  'success',

        );

        return redirect()->back()->with($notification);
    }


}
