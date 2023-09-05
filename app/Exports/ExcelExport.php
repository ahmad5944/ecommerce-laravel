<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExcelExport implements FromView, ShouldAutoSize
{
    public function __construct($view, $records)
    {
        $this->view = $view;
        $this->records = $records;
    }

    public function view(): View
    {
        return view($this->view, $this->records);
    }
}
