<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\HistoryStatusPesanan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index($id){
        $kendaraan = DB::select('SELECT * FROM kendaraan JOIN merk ON merk_id = merk.id WHERE kendaraan.id = ' . $id ,)[0];
        return view("pemesanan", compact("kendaraan"));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'is_checked' => 'required',
            'nama_lengkap' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return redirect()->back()->withErrors($fieldsWithErrorMessagesArray)->withInput();
        }

        DB::beginTransaction();

        try {
            $user = DB::select('SELECT * FROM users WHERE users.id = ' . $request->user_id ,)[0];
            if(!$user) {
                $user = User::create($request->all());
            }

            $request->user_id = $user->id;
            
            $request['status_pesanan_id'] = 1;
            // return $request->all();
            $input = Pesanan::create($request->all());

            $history = HistoryStatusPesanan::create([
                'user_id' => $user->id,
                'pesanan_id' => $input->id,
                'status_pesanan_id' => 1,
            ]);

            if(!$validator->fails()){
                DB::commit();
                return redirect()->route('user.landing')->with('success', 'Pesanan berhasil dikirim');
            }else{
                return redirect()->route('user.landing')->withErrors('error',$validator);
            }
        } catch (\Throwable $t){
            return $t;
            return redirect()->back()->with('error', 'Pesanan gagal dikirim');
            // return redirect()->back()->with('error', $t->getMessage());
        }
    }
}
