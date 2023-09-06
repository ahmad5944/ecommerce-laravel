<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public static $pageTitle = 'Produk';

    public static $routePath = 'product';
    public static $folderPath = 'product';
    public static $permissionName = 'product';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        $this->middleware('permission:product-list', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-show', ['only' => ['show']]);

        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => 'List ' . self::$pageTitle,
        ];
    }
    public function index()
    {
        $datas = Product::orderBy('created_at', 'DESC')->get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact('datas', 'pageTitle', 'pageBreadcrumbs'));
    }
    
    public function create(Request $request)
    {
        $data = new Product();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/create',
            'title' => 'Tambah ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.create', compact('data', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function store(Request $request)
    {
        $req = $request->all();
        $rules = [
            'name'              => 'required',
            'qty'               => 'required|numeric',
            'price'             => 'required|numeric',
            'image'             => 'required|mimes:jpeg,png,jpg,gif',
        ];

        $custom_messages = [
            'name.required'             => 'Nama tidak boleh kosong !',
            'qty.required'              => 'Stok tidak boleh kosong !',
            'qty.numeric'               => 'Stok harus berisikan angka !',
            'price.required'              => 'Harga tidak boleh kosong !',
            'price.numeric'               => 'Harga harus berisikan angka !',
            'image.required'               => 'Image tidak boleh kosong !',
        ];

        $this->validate($request, $rules, $custom_messages);

        if ($request->hasFile('image')) {
            $path = 'public/images/product';

            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $request->file('image')->storeAs($path, $image_name);

            $req['image'] = '/product/' . $image_name;
        }
        Product::create($req);

        Alert::success('Berhasil', 'Data Berhasil diTambahkan');
        return redirect()->route(self::$routePath . '.index');
    }

    public function show(Request  $request, $id)
    {
        $data = Product::find($id);

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
        $data = Product::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/' . $id . '/edit',
            'title' => 'Edit ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.edit', compact('data', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function update(Request $request, Product $product)
    {
        $req = $request->all();
        $rules = [
            'name'              => 'required',
            'qty'               => 'required|numeric',
            'price'             => 'required|numeric',
            'image'             => 'required|mimes:jpeg,png,jpg,gif',
        ];

        $custom_messages = [
            'name.required'             => 'Nama tidak boleh kosong !',
            'qty.required'              => 'Stok tidak boleh kosong !',
            'qty.numeric'               => 'Stok harus berisikan angka !',
            'price.required'              => 'Harga tidak boleh kosong !',
            'price.numeric'               => 'Harga harus berisikan angka !',
            'image.required'               => 'Image tidak boleh kosong !',
        ];

        $this->validate($request, $rules, $custom_messages);

        if (!empty($req['image'])) {
            if ($request->hasFile('image')) {
                $path = 'public/images/users';

                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $request->file('image')->storeAs($path, $image_name);

                $req['image'] = '/users/' . $image_name;
            }
        } else {
            unset($req['image']);
        }
        $product->update($req);

        Alert::success('Berhasil', 'User Berhasil diUpdate');
        return redirect()->route(self::$routePath . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = Product::find($id);
        Product::find($id)->delete();

        Alert::success('Berhasil', 'Data Berhasil diHapus');
        return redirect()->route(self::$routePath . '.index');
    }
}