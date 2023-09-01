<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public static $pageTitle = 'Dashboard';

    public static $routePath = 'dashboard';
    public static $pageBreadcrumbs = [];

    public function __construct()
    {
        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => self::$pageTitle,
        ];

        $this->middleware('auth');
    }

    public function index(){
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view('dashboard', compact('pageBreadcrumbs'));
    }

    public function login(){
        return view('auth.login');
    }
}
