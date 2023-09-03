<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;

use RealRashid\SweetAlert\Facades\Alert;

class FrontLoginController extends Controller
{
    public function index()
    {
        $datas = Product::orderBy('created_at', 'DESC')->get();

        return view('front.user.login', compact('datas'));
    }
    
}