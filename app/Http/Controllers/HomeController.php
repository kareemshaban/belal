<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Role;
use App\Models\Roles;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function employee()
    {
        return view('welcome');
    }

    public function users()
    {

        $users = DB::table('users')
            -> leftJoin('roles', 'users.role_id', '=', 'roles.id')
            -> select('users.*', 'roles.name as role' )
            -> get() ;
        $roles = Role::all();
        return view('admin.Users.index' , compact('users' ,'roles'));
    }
    public function storeUser(Request $request)
    {

        if($request -> id == 0){

            User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'role_id' => $request -> role_id ,
                'password' => Hash::make($request -> password),
            ]);

                return redirect()->route('users')->with('success', __('main.saved'));

        } else {
            $user = User::find($request -> id);
            if($user){
                $user -> update([
                    'name' => $request -> name,
                    'email' => $request -> email,
                    'role_id' => $request -> role_id ,
                    'password' => Hash::make($request -> password),
                ]);

                    return redirect()->route('users')->with('success', __('main.updated'));

            }
        }

    }

    public function showUser($id)
    {
        $user = User::find($id);
        echo json_encode($user);
        exit();
    }
    public function destroyUser($id)
    {
        $user = User::find($id);
        if($user){
            $user -> delete();
            return redirect()->route('users')->with('success', __('main.deleted'));
        }
    }

    public function getUserProfile($id)
    {
        $user = DB::table('users')
            -> leftJoin('roles', 'users.role_id', '=', 'roles.id')
            -> select('users.*', 'roles.name as role')
            -> where('users.id', '=', $id)
            -> get() -> first();
        if($user){

            $countries = Country::all();

            $supplier = Supplier::find($user -> supplier_id);

            $auths = DB::table('authentications')
                -> join('roles' , 'authentications.role_id', '=', 'roles.id')
                -> select('authentications.*' ) ->
                where('authentications.role_id' , $user -> role_id) -> get() ;

            return view('cpanel.Users.profile' , compact('user' , 'auths' , 'countries' , 'supplier'));

        }





    }

    public function resetPassword(Request $request)
    {

        $user = User::find($request -> id);
        if($user){
            $user -> update([
                'password' => Hash::make($request -> new_password),
            ]);
            return redirect()->route('getUserProfile' , $user -> id)->with('success', __('main.updated'));
        }
    }

    public function updatePassword($id)
    {
        $user = User::find($id);

        return view ('admin.Users.updatePassword' , compact('user'));

    }


}
