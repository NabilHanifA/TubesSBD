<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\Models\KontakPesan;
use App\Models\Stasiun;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function backup() {
        return view("landing_backup");
    }

    public function index() {
        return view("landing");
    }

    public function stasiun() {
        $dataMaps = DB::select('SELECT * FROM stasiun');
        return view("stasiun", compact("dataMaps"));
    }

    public function store() {
        $kendaraan = DB::select(
        'SELECT kendaraan.*, baterai.spesifikasi, baterai.kapasitas, merk.nama_merk 
        FROM kendaraan 
        JOIN baterai ON baterai_id = baterai.id 
        JOIN merk ON merk_id = merk.id
        ');
        
        return view('store', compact('kendaraan'));
    }

    public function forum() {
        return view('forum');
    }

    public function tukarTambah() {
        return view('tukar-tambah');
    }

    public function contactUs(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return redirect()->back()->withErrors($fieldsWithErrorMessagesArray)->withInput();
        }

        $input = KontakPesan::create($request->all());
        if(!$validator->fails()){
            return redirect()->back()->with('success', 'Pesan berhasil terkirim!');
        }else{
            return redirect()->back()->withErrors('error',$validator);
        }
    }
}
