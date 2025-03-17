<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->hasRole('super_admin')){
            return redirect()->route('super.index');
        }
        elseif(Auth::user()->hasRole('admin')){
            return redirect()->route('admin.index');
        }
        else{
            return redirect()->route('user.index');

        }
    }
}
