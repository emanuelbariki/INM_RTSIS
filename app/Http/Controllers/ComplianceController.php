<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ComplianceController extends Controller
{
    public function index(): View
    {
        $data['title'] = 'Compliance';
        
        return view('compliance.index', $data);
    }
}
