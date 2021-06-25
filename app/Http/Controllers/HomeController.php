<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
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

         // auth()->user()->givePermissionTo('edit posts');
         // auth()->user()->assignRole('writer');
     // return   auth()->user()->getPermissionsViaRoles();
         // auth()->user()->roles;

        // return User::permission('edit posts')->get();



            $fetchUsers = User::all();


        return view('home',compact('fetchUsers'));
    }
    public function assignRoles(Request $request)
    {
        // $findId = User::findOrFail($request);

      // return User::($findId)->givePermissionTo('Can Write') ;   
    }
}
