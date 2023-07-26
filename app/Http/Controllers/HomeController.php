<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Function for the login view
     *
     * @return void
     */
    public function authLogin()
    {
        $data['title'] = 'Dashboard';
        // return view('auth.login');
        return view('dashboard');
    }
}
