<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total['sales']         = DB::table('sales')->count();
        $total['permissions']   = DB::table('permissions')->count();
        $total['roles']         = DB::table('roles')->count();
        $total['users']         = DB::table('users')->count();

        return view('partials.dashboard', compact('total'));
    }
}
