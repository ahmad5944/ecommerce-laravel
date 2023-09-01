<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use Smalot\PdfParser\Parser;
class TestController extends Controller
{
    public function index(Request $request)
    {
       
        return view('test');
    }

    public function convertToHtml(Request $request)
    {
        $pdfPath = $request->file('pdf')->getRealPath();

        $parser = new Parser();
        $pdf = $parser->parseFile($pdfPath);
        $text = $pdf->getText();

        return view('pdf_to_html', ['html' => $text]);
    }
}
