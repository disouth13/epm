<?php

namespace App\Http\Controllers\Mht;

use Image;
use App\Models\Prs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrsController extends Controller
{
    // method index IndexPrs
    public function IndexPrs()
    {
        $prsIndexGetData = Prs::latest()->get();
        return view('admin.mht.prs.index', compact('prsIndexGetData'));
    }

    public function AddPrs()
    {
        return view('admin.mht.prs.add');
    }

    public function ViewPrs($id)
    {
        $viewDataPrs = Prs::findOrFail($id);
        return view('admin.mht.prs.view', compact('viewDataPrs'));
    }

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
            Image::make($imageBefore)->resize(474, 484)->save('upload/mht/prs/before/'.$name_generate);

            $saveUrlBefore = 'upload/mht/prs/before/'.$name_generate;

        };
        
        if ($request->file('photoAfter')) {
            $imageAfter = $request->file('photoAfter');
            $name_generate = hexdec(uniqid()).'.'.$imageAfter->getClientOriginalExtension();

            // image intervantion
            Image::make($imageAfter)->resize(474, 484)->save('upload/mht/prs/after/'.$name_generate);

            $saveUrlAfter = 'upload/mht/prs/after/'.$name_generate;


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
    
            return redirect()->route('index-prs')->with($notification);


        };

    } //end method

    public function EditPrs($id)
    {
        $ambilDataPrs = Prs::findOrFail($id);

        return view('admin.mht.prs.edit', compact('ambilDataPrs'));
    } //end method

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

            $delete = Prs::find($updateDataPrsID);

            unlink('upload/mht/prs/before/'.$delete->photoBefore);
            $delete->delete();

            $imageBefore = $request->file('photoBefore');
            $name_generate = hexdec(uniqid()).'.'.$imageBefore->getClientOriginalExtension();

            // image intervantion
            Image::make($imageBefore)->resize(474, 484)->save('upload/mht/prs/before/'.$name_generate);

            $saveUrlBefore = 'upload/mht/prs/before/'.$name_generate;

        };
        
        if ($request->file('photoAfter')) {
            $delete2 = Prs::find($updateDataPrsID);
            unlink('upload/mht/prs/after/'.$delete2->photoAfter);
            $delete2->delete();

            $imageAfter = $request->file('photoAfter');
            $name_generate = hexdec(uniqid()).'.'.$imageAfter->getClientOriginalExtension();

            // image intervantion
            Image::make($imageAfter)->resize(474, 484)->save('upload/mht/prs/after/'.$name_generate);

            $saveUrlAfter = 'upload/mht/prs/after/'.$name_generate;


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
    
            return redirect()->route('index-prs')->with($notification);


        }else{


            // update data
            Prs::findOrFail($updateDataPrsID)->update([

                // namadariDB      nmdariForm
                'users_id'      => Auth::user()->id,
                'area'          => $request->area,
                'pic'           => $request->pic,
                'keterangan'    => $request->keterangan,
                'periode'       => $request->periode,
                'created_at'     => Carbon::now(),
            ]);

            // notif message
            $notification = array(
                'message'       =>  'Data berhasil di ubah',
                'alert-type'    =>  'success'
            );
    
            return redirect()->route('index-prs')->with($notification);
        };
           
            

            

    
        
    } //end method
}
