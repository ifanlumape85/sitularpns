<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Information;
use App\Models\Menu;
use App\Models\News;
use App\Models\Slide;
use App\Models\Tag;
use App\Models\Profile;
use App\Models\Ujian;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return;
    }

    public function privacy()
    {
        return view('privacy');
    }
}
