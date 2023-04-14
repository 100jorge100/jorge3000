<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos patie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RolController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol', ['only' => ['index']]);
         $this->middleware('permission:crear-rol', ['only' => ['create','store']]);
         $this->middleware('permission:editar-rol', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Con paginación o podemos poner los datatables opsional lo vemos mas adelante
        // $roles = Role::paginate(5);
        // return view('roles.index',compact('roles'));
        //return view('roles.index');
        $permission = Permission::get();
        return view('roles.index',compact('permission'));
        //recorar a la hora de crear las vistas, al usar esta paginacion, tengo que recordar poner en el el index.blade.php este codigo  {!! $roles->links() !!}
    }
    public function fetchRol()
    {
        $roles = Role::all();
        return response()->json([
            'roles'=>$roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.crear',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|unique:roles,name',
            'permission'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $role = new Role();
            $role->name = $request->input('name');
            $role->save();

            // Adjuntar los permisos al Rol
            $role->permissions()->sync($request->input('permission'));

            // Retornar una respuesta JSON
            return response()->json([
                'status' => 'success',
                'message' => 'La Empresa se Creó Exitosamente',
            ]);
        }
        // $this->validate($request, [
        //     'name' => 'required|unique:roles,name',
        //     'permission' => 'required',
        // ]);

        // $role = Role::create(['name' => $request->input('name')]);
        // $role->syncPermissions($request->input('permission'));

        // return redirect()->route('roles.index');
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
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles.editar',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
}
