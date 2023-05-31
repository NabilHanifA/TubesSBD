<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index() {
        return view("kendaraan");
    }

    public function admin()
    {
        return view("admin");
    }

    public function lamanlogin()
    {
        return view("login");
    }
}
