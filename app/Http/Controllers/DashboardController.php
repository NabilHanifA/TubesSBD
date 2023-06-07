<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = DB::table('pesanan')->selectRaw(
            'COUNT(pesanan.id) as total_pesanan
            ,(SELECT COUNT(id) FROM kendaraan) as total_kendaraan
            ,(SELECT COUNT(id) FROM baterai) as total_baterai
            ,(SELECT COUNT(id) FROM pembayaran) as total_pembayaran
            ,(SELECT COUNT(id) FROM stasiun) as total_stasiun
            ,(SELECT COUNT(id) FROM testimoni) as total_testimoni
            ,(SELECT COUNT(id) FROM galeri) as total_galeri
            ,(SELECT COUNT(id) FROM klien) as total_klien
        ')->first();

        return view("admin", compact('data'));
    }

    public function ajaxTopProvinsi () {
        $data = DB::table('provinsi')->selectRaw(
            'provinsi.nama_provinsi, COUNT(stasiun.id) as total_stasiun
        ')
        ->leftJoin('stasiun', 'stasiun.provinsi_id', 'provinsi.id')
        ->groupBy('provinsi.nama_provinsi')
        ->orderBy('total_stasiun', 'desc')->limit(5)->get();

        return datatables()->of($data)
        ->addIndexColumn()->toJson();
    }

    public function chartStatusPesanan () {
        $data = DB::table('pesanan')->selectRaw(
            'COUNT(CASE WHEN status_pesanan.id = 1 THEN pesanan.id END) as pesanan_pending
            ,COUNT(CASE WHEN status_pesanan.id = 2 THEN pesanan.id END) as pesanan_proses
            ,COUNT(CASE WHEN status_pesanan.id = 3 THEN pesanan.id END) as pesanan_selesai
        ')->join('status_pesanan', 'status_pesanan.id', 'pesanan.status_pesanan_id')->first();

        return response()->json($data);
    }
}
