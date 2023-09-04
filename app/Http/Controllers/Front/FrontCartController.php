<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
class FrontCartController extends Controller
{
    public static $pageTitle = 'Cart';

    public static $routePath = '';
    public static $folderPath = 'front.cart';
    public static $statusName = 'Cart';
    public static $permissionName = 'cart';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        // $this->middleware('permission:front-user-list', ['only' => ['index']]);
        // $this->middleware('permission:front-user-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:front-user-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:front-user-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:front-user-show', ['only' => ['show']]);

        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => 'Home',
        ];
    }

    public function edit(Request  $request, $id)
    {
        $data = Cart::with('product','user')->where('user_id', auth()->user()->id)->get();
        $order = Order::where('user_id', auth()->user()->id)->get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/' . $id . '/edit',
            'title' => self::$pageTitle,
        ];

        return view(self::$folderPath, compact('data', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function addToCart(Request  $request, $id){
        if(auth()->user() != null){
            $req = $request->all();

            $user = auth()->user();
            $product = Product::where('id', $req['product_id'])->get();

            $cart = new Cart;
            $cart->product_id = $req['product_id'];
            $cart->user_id = $req['user_id'];

            $cart->save();
            Alert::success('Berhasil', 'Data Berhasil diTambahkan');
            return redirect()->back();
        }else{
            return redirect()->route('front.index');
        }
    }

    public function removeCart($id){
        $cart = Cart::find($id);

        $cart->delete();

        Alert::success('Berhasil', 'Data Berhasil diHapus');
        return redirect()->back();
    }
    

}
