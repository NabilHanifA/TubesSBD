<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function backup() {
        return view("landing_backup");
    }

    public function index() {
        return view("landing");
    }

    public function stasiun() {
        return view('stasiun');
    }

    public function store() {
        return view('store');
    }

    public function forum() {
        return view('forum');
    }

    public function tukarTambah() {
        return view('tukar-tambah');
    }
}
