<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontakPesan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class KontakPesanController extends Controller
{
    public function index(){
        return view('admin.kontak-pesan');
    }

    public function ajax(){
        $data = KontakPesan::latest()->get();

        return datatables()->of($data)
        ->addIndexColumn()
        ->addColumn('tanggal_formatted', function($row){
            return \Carbon\Carbon::parse($row->created_at)->format('d-m-Y h:i:s');
        })->rawColumns(['deskripsi'])
        ->addColumn('aksi', function($row){
            $btn =
            '<div class="d-flex justify-content-between">
                <div class="col-sm-6">
                    <button class="btn btn-sm btn-success" onclick="editModal('.$row->id.');"><i class="bx bx-edit"></i></button>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-sm ms-2 btn-danger btn-delete" onclick="destroy('.$row->id.');"><i class="bx bx-trash-alt"></i></button>
                </div>
            </div>';

            return $btn;
        })->rawColumns(['aksi', 'deskripsi'])
        ->toJson();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'nama_lengkap' => 'required',
            'subject' => 'required',
            'pesan' => 'required'
        ]);
        $request->created_at = \Carbon\Carbon::now();
        $request->updated_at = \Carbon\Carbon::now();

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return redirect()->back()->withErrors($fieldsWithErrorMessagesArray)->withInput();
        }
        
        $input = KontakPesan::create($request->all());
        /* SQL : INSERT INTO kontak_pesan(`email`, `nama_lengkap`, `subject`, `pesan`, `created_at`, `updated_at`)
                 VALUES('$request->email', '$request->nama_lengkap', '$request->subject', '$request->pesan','$request->created_at', '$request->updated_at' ) */
        $input->save();
        
        if(!$validator->fails()){
            return redirect()->route('admin.messages')->with('success', 'Data berhasil disimpan');
        }else{
            return redirect()->route('admin.messages')->withErrors('error',$validator);
        }
    }

    public function edit(Request $request, $id){
        $selectedItem = KontakPesan::find($id);
        return response()->json($selectedItem);
    }

    public function update(Request $request, $id){
        $data = KontakPesan::find($id);
        $former = "galeri/".$data['img'];
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'img'   => 'image|max:2048'
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return redirect()->back()->withErrors($fieldsWithErrorMessagesArray)->withInput();
        }

        $update = $data->update($request->all());
        return redirect()->route('admin.messages')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id){
        $data = KontakPesan::find($id);
        // SQL : DELETE FROM kontak_pesan WHERE id = $id;
        if($data->delete()){
            return response()->json(['status' => 'success','message'=>'Data deleted successfully.']);
        }else{
            return response()->json(['status'=>'error', 'message' => 'failed to delete Data']);
        }
    }
}
