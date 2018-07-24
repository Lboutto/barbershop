<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Styde\Html\Facades\Alert;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Process
        $users = $this->user->get();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Process
        $roles = DB::table('roles')->where('id', '!=', 1)->pluck('name', 'id')->toArray();

        return view('user.create', compact('roles'));
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
            'name'       => 'required|max:50',
            'email'      => 'required|email|max:60|unique:users,email',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        $user = $this->user->create($request->all());

        $role = DB::table('roles')->where('id', $request->get('role_id'))->first();

        $user->assignRole($role->name);

        Alert::success('Usuario Creado');

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Process
        $user = $this->user->findOrFail($id);

        $roles = DB::table('roles')->where('id', '!=', 1)->pluck('name', 'id')->toArray();

        $user_role = DB::table('model_has_roles')->where('model_id', $user->id)
                                                 ->where('model_type', 'App\Models\User')->first();
        $disable = true;

        return view('user.edit', compact('user', 'roles', 'user_role', 'disable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Process
        $user = $this->user->findOrFail($id);

        $this->validate($request,[
            'name'       => 'required|max:50',
            'email'      => 'required|email|max:60|unique:users,email,'. $user->id,
        ]);

        $user->update($request->all());

        $role = DB::table('roles')->where('id', $request->get('role_id'))->first();

        $user->syncRoles([$role->name]);

        Alert::success('Usuario Modificado');

        return redirect()->route('user.index');
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
        $user = $this->user->findOrFail($id);

        //Process
        $user->delete();

        $message = 'Usuario Eliminado';

        if ($request->ajax()) {

            return response()->json(['delete' => 'OK', 'message' => $message], 200);
        }

        Alert::info($message);

        return redirect()->route('user.index');
    }
}
