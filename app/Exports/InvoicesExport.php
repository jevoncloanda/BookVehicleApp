<?php

namespace App\Exports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoicesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Invoice::all();
    }
    public function headings(): array
    {
        return ["id", "vehicle_id", "driver_id", "user_id", "Status", "created_at", "updated_at"];
    }
}
