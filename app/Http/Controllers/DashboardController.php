<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard ()
    {
        $data['title'] = 'Dashboard';

        return view('dashboard', $data);
    }

    public function testFunction(Request $request)
    {
        return "Emanuel";
    }
}
