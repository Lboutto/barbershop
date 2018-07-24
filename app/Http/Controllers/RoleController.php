<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Styde\Html\Facades\Alert;

class RoleController extends Controller
{
    /**
     * @var Role
     */
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Process
        $roles = $this->role->get();

        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Process
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Process
        $this->validate($request,[
            'name' => 'required|max:50|unique:roles,name',
        ]);

        $this->role->create($request->all());

        Alert::success(trans('app.role_created'));

        return redirect()->route('role.index');
    }

    public function assign($id)
    {
        $role = $this->role->findOrFail($id);

        $permission_role = DB::table('role_has_permissions')->where('role_id', $role->id)->pluck('permission_id')->toArray();

        $permissions = DB::table('permissions')->pluck('name', 'id')->toArray();

        return view('role.assign', compact('role', 'permissions', 'permission_role'));
    }

    public function save_assign(Request $request)
    {
        $role = Role::findByName($request->get('role'));

        DB::table('role_has_permissions')->where('role_id', $request->get('role_id'))->delete();

        foreach ($request->get('permission') as $permission) {

            $obj = DB::table('permissions')->select('name')->where('id', $permission)->first();

            $role->givePermissionTo($obj->name);
        }

        Alert::success('Permisos asignados correctamente a '. $role->name);

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $role = $this->role->findOrFail($id);

        //Process
        $role->delete();

        $message = 'Rol eliminado';

        if ($request->ajax()) {

            return response()->json(['delete' => 'OK', 'message' => $message], 200);
        }

        Alert::info($message);

        return redirect()->route('role.index');
    }
}
