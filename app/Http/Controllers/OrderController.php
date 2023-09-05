<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{    
    public static $pageTitle = 'Order';

    public static $routePath = 'order';
    public static $folderPath = 'order';
    public static $permissionName = 'Order';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => 'List ' . self::$pageTitle,
        ];
    }
    public function index()
    {
        $datas = Order::select('id', 'no_invoice', 'user_id')
        ->groupBy('no_invoice')
        ->get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact('datas', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function show(Request  $request, $inv)
    {
        $invoice  = Order::where('no_invoice', $inv)->first();
        $datas    = Order::where('no_invoice', $inv)->get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => self::$routePath . '/' . $inv,
            'title' => 'Show ' . self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath . '.show', compact('invoice', 'datas', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

}
