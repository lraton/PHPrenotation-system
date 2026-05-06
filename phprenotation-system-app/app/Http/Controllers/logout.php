<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logout extends Controller
{
    public function index(Request $request)
    {
        $request->session()->remove('token');
        return redirect('/login');
    }
}
