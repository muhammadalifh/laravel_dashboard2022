<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WelcomeController extends Controller
{
    public function welcome_index()
    {
        return view('welcome');
    }
    public function welcome_json()
    {
        $data = DB::table('portofolio')
        ->join('klien', 'klien.id', '=', 'portofolio.klien_id')
        ->join('jenis', 'jenis.id', '=', 'portofolio.jenis_id')
        ->join('status', 'status.id', '=', 'portofolio.status_id')
        ->join('teknologi', 'teknologi.id', '=', 'portofolio.teknologi_id')
        ->select('portofolio.*', 'klien.klien', 'jenis.jenis', 'status.status', 'teknologi.teknologi')
        ->get();
        return DataTables::of($data)->make(true);
    }
}
