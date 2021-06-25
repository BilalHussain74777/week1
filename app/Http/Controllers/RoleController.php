<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
class RoleController extends Controller
{
    //

    public function index(){

        $fetchRoles = Roles::all()->sortBy('name');;
        return view('auth.roles',compact('fetchRoles'));


    }


    public function store(Request $request)
    {
        Roles::create($request->all());
        return redirect()->route('roles.index')->with('message',$request->name." Has Been Addedd");
            
    }

     public function destroy($id)
     {
        $fetchId = Roles::find($id);
        $fetchId->delete();
        return redirect()->route('roles.index')->with('message' , 'Role Deleted');
    }
}
