<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard')->with('type', 'success')->with('Login feito com sucesso!');
    }
}
