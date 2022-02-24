<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EksternalController extends Controller
{
    public function index()
    {
        return view('eksternal.index');
    }

    public function eksternal_json()
    {
        $data = DB::table('portofolio')
        ->join('klien', 'klien.id', '=', 'portofolio.klien_id')
        ->join('jenis', 'jenis.id', '=', 'portofolio.jenis_id')
        ->join('status', 'status.id', '=', 'portofolio.status_id')
        ->join('teknologi', 'teknologi.id', '=', 'portofolio.teknologi_id')
        ->select('portofolio.*', 'klien.klien', 'jenis.jenis', 'status.status', 'teknologi.teknologi')
        ->get();
        return Datatables::of($data)->make(true);
    }
}
