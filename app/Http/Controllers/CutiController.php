<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Pegawai;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class CutiController extends Controller
{
    protected $model;

    public static $pageTitle        = 'Cuti';
    public static $statusName       = 'Cuti';
    public static $routePath        = 'cuti';
    public static $folderPath       = 'cuti';
    public static $permissionName   = 'cuti';

    public static $pageBreadcrumbs = [];

    function __construct(Cuti $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $datas = $this->model::with('pegawai')->get();

        $pageTitle = self::$pageTitle;
        $routePath = self::$routePath;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact('datas', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function create(Request $request)
    {
        $data       = new $this->model();
        $karyawan   = Pegawai::all();

        $pageTitle = self::$pageTitle;
        $routePath = self::$routePath;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . $routePath . '/create',
            'title' => 'Tambah ' . $pageTitle,
        ];

        return view(self::$folderPath . '.create', compact('data', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'karyawan'));
    }

    public function store(Request $request)
    {
        $req = $request->all();
        
        $rules = [
            'alasan'        => 'required',
            'tanggal_cuti'        => 'required',
            'selesai_cuti'        => 'required',
        ];

        $custom_messages = [
            'alasan.required'           => 'Alasan tidak boleh kosong !',
            'tanggal_cuti.required'           => 'Tanggal Cuti boleh kosong !',
            'alasselesai_cutian.required'           => 'Tanggal Selesai Cuti tidak boleh kosong !',
        ];
        $this->validate($request, $rules, $custom_messages);

        $tahun    = Carbon::now()->format('Y');
        $getTahun = Cuti::where('pegawai_id', $req['pegawai_id'])->where('tanggal_cuti', 'like',"%".$tahun."%")->count();

        if($getTahun >= 5) {
            Alert::error('Anda melebihi batas cuti!');
            return redirect()->route(self::$folderPath . '.index');
        }else{    
            $this->model::create($req);
    
            Alert::success('Berhasil', self::$statusName . ' Berhasil diTambahkan');
            return redirect()->route(self::$folderPath . '.index');
        }

    }

    public function show(Request $request, $id)
    {
        $data = $this->model::find($id);

        $pageTitle = self::$pageTitle;
        $routePath = self::$routePath;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => $routePath . '/' . $id,
            'title' => 'Show ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.show', compact('data', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function edit(Request $request, $id)
    {
        $data = $this->model::find($id);
        $karyawan   = Pegawai::all();

        $pageTitle = self::$pageTitle;
        $routePath = self::$routePath;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . $routePath . '/' . $id . '/edit',
            'title' => 'Edit ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.edit', compact('data', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'karyawan'));
    }

    public function update(Request $request, $id)
    {
        $req = $request->all();
        $data = Cuti::find($id);
        $rules = [
            'alasan'        => 'required',
            'tanggal_cuti'        => 'required',
            'selesai_cuti'        => 'required',
        ];

        $custom_messages = [
            'alasan.required'           => 'Alasan tidak boleh kosong !',
            'tanggal_cuti.required'           => 'Tanggal Cuti boleh kosong !',
            'alasselesai_cutian.required'           => 'Tanggal Selesai Cuti tidak boleh kosong !',
        ];

        $this->validate($request, $rules, $custom_messages);

        $data->update($req);

        Alert::success('Berhasil', self::$statusName . ' Berhasil diUpdate');
        return redirect()->route(self::$routePath . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $this->model::find($id)->delete();

        Alert::success('Berhasil', self::$statusName . ' Berhasil diDelete');
        return redirect()->route(self::$routePath . '.index');
    }
}
