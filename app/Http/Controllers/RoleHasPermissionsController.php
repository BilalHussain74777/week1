<?php

namespace App\Http\Controllers;

use App\Models\RoleHasPermissions;
use App\Models\Roles;
use App\Models\Permissions;
use Illuminate\Http\Request;

class RoleHasPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch data from roles
        $fetchRoles = Roles::all();

        // fetch data from permissions
        $fetchPermission = Permissions::all();



        // fetching the data fro, RoleHasPermission table
        $fetchRoleHasPermData = RoleHasPermissions::all()->sortByDesc('role_id');

        // passing to the blade page
        return view('auth.roles_has_permissions',compact('fetchPermission','fetchRoles','fetchRoleHasPermData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RoleHasPermissions::create($request->all());
        return redirect()->route('role-has-permissions.index')->with('message','Permission Assigned To Role');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoleHasPermissions  $roleHasPermissions
     * @return \Illuminate\Http\Response
     */
    public function show(RoleHasPermissions $roleHasPermissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoleHasPermissions  $roleHasPermissions
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleHasPermissions $roleHasPermissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoleHasPermissions  $roleHasPermissions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleHasPermissions $roleHasPermissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleHasPermissions  $roleHasPermissions
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleHasPermissions $roleHasPermissions)
    {
        //
    }
}
