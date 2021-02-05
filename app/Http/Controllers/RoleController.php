<?php

namespace App\Http\Controllers;

use App\Role;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Role::all());
        // return 'Hola desde RoleController index';

        // Pendiente: añadir autorización
        return view('theme.backoffice.pages.role.index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(StoreRequest $request, Role $role)
    {
        // dd($request);
        $role = $role->store($request);
        // dd($role);
        // return 'Se ha almacenado el rol';
        return redirect()->route('backoffice.role.show', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('theme.backoffice.pages.role.show', [
            'role' => $role,
            'permissions' => $role->permissions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('theme.backoffice.pages.role.edit', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Role $role)
    {
        // dd($request, 'Validación exitosa');
        $role->my_update($request);
        return redirect()->route('backoffice.role.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Pendiente: añadir autorización
        // dd($role);
        $role->delete();  
        alert('Éxito', 'Rol eliminado', 'success')->showConfirmButton();
        return redirect()->route('backoffice.role.index');
    }
}
