<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;
use App\Helpers\AuditTrail;
use App\Helpers\LogActivity;

class RoleController extends Controller
{
    public static $pageTitle = 'Role';
    // public static $pageDescription = 'Role Description';
    // public static $modelName = 'App\Models\Role';

    public static $routePath = 'role';
    public static $folderPath = 'role';

    public static $permissionName = 'role';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        // $this->middleware('permission:role-list', ['only' => ['index']]);
        // $this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:role-show', ['only' => ['show']]);

        // self::$pageBreadcrumbs[] = [
        //     'page' => '/'.self::$routePath,
        //     'title' => 'List '.self::$pageTitle,
        // ];
    }

    public function index(Request $request)
    {

        $datas = Role::orderBy('updated_at', 'DESC')->get();
        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath.'.index', compact('datas', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function create(Request $request)
    {

        $role = new Role();
        $permissions = Permission::get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/create',
            'title' => 'Create '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.create', compact('role', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'permissions'));
    }

    public function store(Request $request)
    {
        // audit trail buat yg method post

        request()->validate([
            // 'name' => 'required|unique:role,name',
            'permission' => 'required'
        ]);

        $req = $request->all();
        $role = Role::create([
            'name' => $req['name'],
            'guard_name' => 'web',
            // 'status' => 1
        ]);
        $role->syncPermissions($req['permission']);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' created successfully.');
    }

    public function show(Request $request, $id)
    {
    }

    public function edit(Request $request, $id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        // $isPermission = $data->permissions->pluck('id')->toArray();
        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/'.self::$routePath.'/'.$id.'/edit',
            'title' => 'Edit Role',
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.edit', compact('role', 'routePath', 'permissions','pageTitle', 'pageBreadcrumbs', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        // audit trail buat yg method post
        $req = $request->all();

        $role->update([
            'name' => $req['name'],
        ]);
        $role->syncPermissions($req['permission']);

        return redirect()->route(self::$folderPath.'.index')
            ->with('success', 'Role Berhasil diupdate');
    }
}
