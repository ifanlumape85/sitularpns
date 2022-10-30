<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ujian;

class DashboardController extends Controller
{
    public function index()
    {
        $ujians = Ujian::get();
        return view('dashboard', compact('ujians'));
    }
}
