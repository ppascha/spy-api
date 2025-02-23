<?php

namespace App\Http\Controllers;

use App\Models\Spy;

class SpyController extends Controller
{
    public function index()
    {
        $spies = Spy::all();
        return view('spies.index', compact('spies'));
    }

}
