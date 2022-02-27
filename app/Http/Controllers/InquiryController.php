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
        ->join('sumber_air_limbah', 'sumber_air_limbah.id', '=', 'inquiry.inquiry_sumber_air_limbah_id')
        ->select('inquiry.*', 'sumber_air_limbah.sumber_air_limbah')
        ->get();
        return DataTables::of($data)->make(true);
    }

}
