<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminloginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.admin_login');
    }
}
