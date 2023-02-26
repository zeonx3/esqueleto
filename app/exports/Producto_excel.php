<?php
namespace App\exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Producto_excel implements FromView
{
    public function view(): View
    {
        return view('doc_ejemplos.producto_excel');
    }
}