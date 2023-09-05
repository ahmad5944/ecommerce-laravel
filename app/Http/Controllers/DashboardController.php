<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public static $pageTitle = 'Dashboard';

    public static $routePath = 'dashboard';
    public static $pageBreadcrumbs = [];

    public function __construct()
    {
        // $this->middleware('permission:dashboard-list', ['only' => ['index']]);

        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => self::$pageTitle,
        ];

    }

    public function index(Request $request){
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        $user = User::where('role', 'user')->count();
        $product = Product::count();
        $order = Order::count();

        return view('dashboard', compact('pageBreadcrumbs', 'user', 'product', 'order'));
    }

}
