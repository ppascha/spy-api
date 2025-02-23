<?php

namespace App\Http\Controllers;

use App\Models\Agency;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::all();
        return view('agencies.index', compact('agencies'));
    }
}
