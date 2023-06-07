<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PesananController extends Controller
{
    public function index(){
        return view('admin.pesanan');
    }

    public function ajax(){
        $data = Pesanan::selectRaw('pesanan.*, users.name, nama_kendaraan')
        ->join('users', 'users.id', 'pesanan.user_id')
        ->join('kendaraan', 'kendaraan.id', 'pesanan.kendaraan_id')
            // ->join('users', 'users.id', 'pesanan.user_id')
            ->get();

        return datatables()->of($data)
        ->addIndexColumn()->toJson();
    }
}
