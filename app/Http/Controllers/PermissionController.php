<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

use Illuminate\Support\Facades\Auth;
use App\Helpers\AuditTrail;
use App\Helpers\LogActivity;

use RealRashid\SweetAlert\Facades\Alert;
class PermissionController extends Controller
{
    public static $pageTitle = 'User Permission';
    public static $response = 'User Permission';

    public static $routePath = 'permission';
    public static $statusName = 'Permission';
    public static $folderPath = 'permission';
    public static $permissionName = 'permission';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        // $this->middleware('permission:user-list', ['only' => ['index']]);
        // // $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        // $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:user-show', ['only' => ['show']]);

        // self::$pageBreadcrumbs[] = [
        //     'page' => '/'.self::$routePath,
        //     'title' => 'List '.self::$pageTitle,
        // ];
    }

    public function index(Request $request)
    {
        $datas = Permission::all();

        $pageTitle = self::$pageTitle;
        $routePath = self::$routePath;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath.'.index', compact('datas', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function create(Request $request)
    {
        $data = new Permission();

        $pageTitle = self::$pageTitle;
        $routePath = self::$routePath;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/'.self::$routePath.'/create',
            'title' => 'Tambah '.self::$pageTitle,
        ];

        return view(self::$folderPath.'.create', compact('data', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function store(Request $request)
    {
        try {
            // audit trail buat yg method post

            $req = $request->all();
            $req['guard_name'] = 'web';
            // $req['created_by'] = Auth::user()->id;

            Permission::create($req);
            Alert::success('Berhasil', 'Data Berhasil diTambahkan');
            return redirect()->route(self::$routePath.'.index');

        } catch (\Exception $ex) {
            Alert::error('Error', $ex->getMessage());
            return redirect()->back();
        }
    }

    public function show(Request $request, $id)
    {
        $data = Permission::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => self::$routePath.'/'.$id,
            'title' => 'Show '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.show', compact('data', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function edit(Request $request, $id)
    {
        $data = Permission::find($id);

        $pageTitle = self::$pageTitle;
        $routePath = self::$routePath;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/'.self::$routePath.'/'.$id.'/edit',
            'title' => 'Edit '.self::$pageTitle,
        ];

        return view(self::$folderPath.'.edit', compact('data', 'pageTitle', 'routePath', 'pageBreadcrumbs'));
    }

    public function update(Request $request, Permission $permission)
    {
        try {
            // audit trail buat yg method post

            $req = $request->all();
            // $req['updated_by'] = Auth::user()->id;
            $permission->update($req);

            Alert::success('Berhasil', self::$response.' Berhasil diUpdate');
            return redirect()->route(self::$routePath.'.index');
        } catch (\Exception $ex) {
            Alert::error('Error', $ex->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id)
    {
        $data = Permission::find($id)->delete();
        
        // audit trail buat yg method post
        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$response.' Berhasil dihapus');
    }
}
