<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Commands\CreatePermission;
use Spatie\Permission\Contracts\Permission as ContractsPermission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest('id')->paginate(3);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = ModelsPermission::all()->groupBy('group');
        return view('admin.roles.create', compact('permissions'));
        
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response;
     */
    public function store(CreateRoleRequest $request)
    {
        $dataCreate = $request->all();
        $dataCreate['gaurd_name'] = 'web';
        $role = Role::create($dataCreate);
        $role->permissions()->attach($dataCreate['permission_ids']);
        return to_route('roles.index')->with(['message' => 'create success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::with('permissions')->FindOrFail($id);
        $permissions = Permission::all()->groupBy('group');
        return view('admin.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request,  $id)
    {
        $role = Role::FindOrFail($id);
        $dataUpdate = $request->all();
        $role->update($dataUpdate);
        $role->permissions()->sync($dataUpdate['permission_ids']);
        return to_route('roles.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        return to_route('roles.index')->with(['message' => 'delete success']);
    }
}
