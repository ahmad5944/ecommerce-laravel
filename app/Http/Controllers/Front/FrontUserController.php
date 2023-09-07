<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail; 
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UserVerify;
use Illuminate\Support\Str;

class FrontUserController extends Controller
{
    public static $pageTitle = 'User';

    public static $routePath = '';
    public static $folderPath = 'front.user';
    public static $statusName = 'User';
    public static $permissionName = 'user';
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

    public function create()
    {
        $data = new User();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/create',
            'title' => 'Register',
        ];

        return view(self::$folderPath . '.register', compact('data', 'pageTitle', 'pageBreadcrumbs'));
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

        if ($request->hasFile('image')) {
            $path = 'public/images/users';

            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $request->file('image')->storeAs($path, $image_name);

            $req['image'] = '/users/' . $image_name;
        }
        $req['role'] = 'user';

        $req['password'] = Hash::make($req['password']);
        $user = User::create($req);
        $user->assignRole($req['role']);
        $token = Str::random(64);
  
        UserVerify::create([
              'user_id' => $user->id,
              'token' => $token
            ]);

        Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        Alert::success('Berhasil', 'Data Berhasil diTambahkan, Cek Email!');
        return redirect()->route('front.product');

    }

    public function edit(Request  $request, $id)
    {
        $roles = Role::all();
        $data = User::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/' . $id . '/edit',
            'title' => 'Edit ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.edit', compact('data', 'roles', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function update(Request $request, $id)
    {
        $req = $request->all();
        $user = User::find($id);

        $rules = [
            'name'              => 'required',
            'no_telp'           => 'required|numeric',
            'email'             => 'required|email',
            'password'          => 'nullable|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
        ];

        $custom_messages = [
            'name.required'                 => 'Nama tidak boleh kosong !',
            'no_telp.required'              => 'No Telp tidak boleh kosong !',
            'no_telp.numeric'               => 'No Telp harus berisikan angka !',
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
        // $req['role_id'] = 'user';
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
        
        $user->update($req);
        // DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        Alert::success('Berhasil', 'User Berhasil diUpdate');
        return redirect()->route('front.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = User::find($id);
        User::find($id)->delete();

        Alert::success('Berhasil', 'Data Berhasil diHapus');
        return redirect()->route(self::$routePath . '.index');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }
}
