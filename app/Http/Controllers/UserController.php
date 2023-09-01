<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AuditTrail;
use App\Helpers\GetIp;
use App\Helpers\LogActivity;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
class UserController extends Controller
{
    public static $pageTitle = 'User';

    public static $routePath = 'user';
    public static $folderPath = 'user';
    public static $statusName = 'User';
    public static $permissionName = 'user';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        // $this->middleware('permission:user-list', ['only' => ['index']]);
        // $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:user-show', ['only' => ['show']]);

        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => 'List ' . self::$pageTitle,
        ];
    }
    public function index()
    {
        $datas = User::orderBy('created_at', 'DESC')->get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact('datas', 'pageTitle', 'pageBreadcrumbs'));
    }
    
    public function create(Request $request)
    {
        $data = new User();
        $roles = Role::all();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/create',
            'title' => 'Tambah ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.create', compact('data', 'pageTitle', 'pageBreadcrumbs', 'roles'));
    }

    public function store(Request $request)
    {
        $req = $request->all();

        $rules = [
            'name'              => 'required',
            'no_telp'           => 'required|numeric',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
        ];

        $custom_messages = [
            'name.required'                 => 'Nama tidak boleh kosong !',
            'no_telp.required'              => 'No Telp tidak boleh kosong !',
            'no_telp.numeric'               => 'No Telp harus berisikan angka !',
            'email.required'                => 'Email tidak boleh kosong !',
            'email.email'                   => 'Format email salah !',
            'email.unique'                  => 'Email sudah terdaftar !',
            'password.required'             => 'Password tidak boleh kosong !',
            'password.regex'                => 'Password harus mengandung karakter, angka dan huruf besar & kecil !',
        ];

        $this->validate($request, $rules, $custom_messages);

        $req['password'] = Hash::make($req['password']);
        $user = User::create($req);

        Alert::success('Berhasil', 'Data Berhasil diTambahkan');
        return redirect()->route(self::$routePath . '.index');
    }

    public function show(Request  $request, $id)
    {
        $data = User::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => self::$routePath . '/' . $id,
            'title' => 'Show ' . self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath . '.show', compact('data', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function edit(Request  $request, $id)
    {
        $roles = Role::pluck('name', 'id')->all();
        $data = User::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/' . $id . '/edit',
            'title' => 'Edit ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.edit', compact('data', 'roles', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function update(Request $request, User $user)
    {
        $req = $request->all();

        $rules = [
            'nama_depan'        => 'required',
            'nama_belakang'    => 'required',
            'email'             => 'required|email',
            'password'          => 'nullable|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
        ];

        $custom_messages = [
            'nama_depan.required'           => 'Nama depan tidak boleh kosong !',
            'nama_belakang.required'       => 'Nama belakang tidak boleh kosong !',
            'email.required'                => 'Email tidak boleh kosong !',
            'email.email'                   => 'Format email salah !',
            'password.regex'                => 'Password harus mengandung karakter, angka dan huruf besar & kecil !',
        ];

        $this->validate($request, $rules, $custom_messages);

        if (!empty($req['password'])) {
            $req['password'] = Hash::make($req['password']);
        } else {
            unset($req['password']);
        }
        
        $user->update($req);

        Alert::success('Berhasil', 'User Berhasil diUpdate');
        return redirect()->route(self::$routePath . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = User::find($id);
        User::find($id)->delete();

        return redirect()->route(self::$routePath . '.index')
            ->with('success', 'User Berhasil dihapus');
    }
}
