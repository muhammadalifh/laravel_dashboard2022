<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class InquiryController extends Controller
{
    public function index()
    {
        return view('inquiry.index');
    }

    public function data_klien()
    {
        return view('inquiry.data-klien');
    }

    public function data_klien_json(Request $request)
    {
        $data = DB::table('inquiry')
        // ->join('sumberairlimbah', 'sumberairlimbah.id', '=', 'inquiry.inquiry_sumber_air_limbah_id')
        ->select('inquiry.*')
        ->get();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('download', function ($data) {
                    if(auth()->user()->role == "2"){
                        $button = "<a href='storage/". $data->inquiry_upload_data ."' data-toggle='tooltip' download title='Download' class='edit btn btn-info btn-xs btn-flat' id='' ><i class='fa fa-download'></i></a>  ";
                        return $button;
                    }
                })
                ->rawColumns(['download'])
                ->make(true);
        }
        return DataTables::of($data)->make(true);
    }

}
