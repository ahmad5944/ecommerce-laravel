<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
class FrontOrderController extends Controller
{
    public static $pageTitle = 'Order';

    public static $routePath = '';
    public static $folderPath = 'front.order';
    public static $statusName = 'Order';
    public static $permissionName = 'order';
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

    public function index(Request $request)
    {
        $data = Order::with('product','user')->where('user_id', auth()->user()->id)->get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/' ,
            'title' => self::$pageTitle,
        ];

        return view(self::$folderPath, compact('data', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function order(){
        if(auth()->user() != null){
            $time = Carbon::now();
            $user = auth()->user()->id;

            $data = Cart::where('user_id', $user)->get();

            foreach($data as $value){
                $order = new Order;

                $order->user_id = $value->user_id;
                $order->product_id = $value->product_id;
                $order->no_invoice = 'INV'.$time->format('his').$value->user_id;
                $order->save();

                $cartId = $value->id;

                $cart = Cart::find($cartId);
                $cart->delete();
            }
            
            Alert::success('Berhasil', 'Order Berhasil diTambahkan');
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
