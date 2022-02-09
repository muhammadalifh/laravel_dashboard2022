<?php

namespace App\Exports;

use App\Models\Portofolio;
use Maatwebsite\Excel\Concerns\FromCollection;

class PortofolioExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Portofolio::all();
    }
}
