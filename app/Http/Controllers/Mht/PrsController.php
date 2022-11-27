<?php

namespace App\Http\Controllers\Mht;

use Image;
use App\Models\Prs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    }
}
