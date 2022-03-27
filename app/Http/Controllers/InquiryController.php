<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        ->join('sumberairlimbah', 'sumberairlimbah.id', '=', 'inquiry.inquiry_sumber_air_limbah_id')
        ->select('inquiry.*', 'sumberairlimbah.sumberairlimbah')
        ->get();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    if((auth()->user()->role == "2" || auth()->user()->role == "1") && $data->inquiry_upload_data != null) {
                        $button = "<a href='storage/". $data->inquiry_upload_data ."' data-toggle='tooltip' download title='Download' target='_blank' class='download btn btn-info btn-xs btn-flat' id='' ><i class='fa fa-download'></i></a> <br> <br>";
                        $button .= " <button title='Hapus' data-toggle='tooltip' type='submit' class='hapus_inquiry btn btn-xs btn-danger btn-flat' id='" . $data->id . "' ><i class='fas fa-trash-alt'></i></button>";
                        return $button;
                    }
                    else {
                        $button = "<a href='#' download data-toggle='tooltip' title='Download' class='download disabled btn btn-info btn-xs btn-flat' id='' ><i class='fa fa-download'></i></a> <br> <br>";
                        $button .= " <button title='Hapus' data-toggle='tooltip' type='submit' class='hapus_inquiry btn btn-xs btn-danger btn-flat' id='" . $data->id . "' ><i class='fas fa-trash-alt'></i></button>";
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return DataTables::of($data)->make(true);
    }


    public function update_data_klien(Request $request)
    {
        if ($request->ajax()) {
            Inquiry::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);
            return response()->json(['success' => true]);
        }
    }

    public function hapus_data_klien()
    {
        $id = request()->id;
        $data = Inquiry::find($id);
        if($data->inquiry_upload_data != null) {
            Storage::delete($data->inquiry_upload_data);
        }
        $data->delete();
        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }

}
