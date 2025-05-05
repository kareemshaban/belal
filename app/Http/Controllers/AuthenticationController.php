<?php

namespace App\Http\Controllers;

use App\Models\Authentication;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('authentications')
            -> join('roles', 'roles.id', '=', 'authentications.role_id')
            -> join('forms', 'forms.id', '=', 'authentications.form_id')
            -> select('authentications.*', 'roles.name_ar as role_ar' , 'roles.name_en as role_en' ,
                'forms.name_ar as form_ar' , 'forms.name_en as form_en')
            -> get();

        //return $data ;

        return view('cpanel.Auth.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('cpanel.Auth.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        for ($i = 0; $i < count($request->id); $i++) {
            if ($request->id[$i] == 0) {
                Authentication::create([
                    'role_id' => $request->role_id[$i],
                    'form_id' => $request->form_id[$i],
                    'form_name' => "",
                    'access_level' => $request->access_level[$i], // 0 no access 1 full access 2 view access
                    'user_ins' => Auth::user()->id,
                    'user_upd' => 0
                ]);


            } else {
                $auth = Authentication::find($request->id[$i]);
                if ($auth) {
                    $auth->update([
                        'role_id' => $request->role_id[$i],
                        'form_id' => $request->form_id[$i],
                        'form_name' => "",
                        'access_level' => $request->access_level[$i], // 0 no access 1 full access 2 view access
                        'user_upd' => Auth::user()->id,
                    ]);
                }
            }

        }
        return redirect()->route('auth')->with('success', __('main.saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authentication  $authentication
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth = Authentication::find($id);
        echo json_encode($auth);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authentication  $authentication
     * @return \Illuminate\Http\Response
     */
    public function edit(Authentication $authentication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Authentication  $authentication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $auth = Authentication::find($request -> id);
        if($auth){
            $auth -> update([
                'role_id' => $request -> role_id,
                'form_id' => $request -> form_id,
                'form_name' => $request -> form_name,
                'access_level' => $request -> access_level, // 0 no access 1 full access 2 view access
                'user_upd' => Auth::user()->id,
            ]);
            return redirect()->route('auth')->with('success', __('main.updated'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authentication  $authentication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auth = Authentication::find($id);
        if($auth){
            $auth -> delete();
            return redirect()->route('auth')->with('success', __('main.deleted'));
        }
    }

    public function getRoleAuthForms($id)
    {
        $role = Roles::find($id) ;
        $role_ar = $role -> name_ar;
        $role_en = $role -> name_en;
        $data = DB::table('forms')
            ->leftJoin('authentications', function ($join) use ($id) {
                $join->on('forms.id', '=', 'authentications.form_id')
                    ->where('authentications.role_id', '=', $id);
            })
            ->select(
                'forms.id as form_id',
                'forms.name_ar as form_ar',
                'forms.name_en as form_en',
                'authentications.access_level',
                DB::raw($id . ' as role_id') ,
                DB::raw("'" . $role_ar . "' as role_ar"),
                DB::raw("'" . $role_en . "' as role_en"),
                DB::raw('COALESCE(authentications.id, 0) as auth_id')
            )
            ->get();

        echo json_encode($data)  ;
        exit();
    }
}
