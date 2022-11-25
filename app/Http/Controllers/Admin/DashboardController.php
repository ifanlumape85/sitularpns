<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use App\Models\Ujian;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $ujians = Ujian::get();
        $registrasi = Registrasi::count();
        $not_active = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'User');
            }
        )->where('email_verified_at', null)->count();

        $active = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'User');
            }
        )->where('email_verified_at', '!=', null)->count();
        return view('dashboard', compact('ujians', 'registrasi', 'active', 'not_active'));
    }

    public function status()
    {
        $registrasis = Registrasi::latest()->paginate(10);
        return view('status', compact('registrasis'));
    }

    public function aktif()
    {
        $items = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'User');
            }
        )->where('email_verified_at', '!=', null)->latest()->paginate();
        return view('pengguna', compact('items'));
    }

    public function tidak()
    {
        $items = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'User');
            }
        )->where('email_verified_at', null)->latest()->paginate();
        return view('pengguna', compact('items'));
    }
}
