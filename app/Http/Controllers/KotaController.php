<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class KotaController extends Controller
{
    public function index(){
        $provinsi = Provinsi::all();
        return view('admin.kota', compact('provinsi'));
    }

    public function ajax(){
        $data = Kota::latest()->get();
        return datatables()->of($data)
        ->addIndexColumn()
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
        })->rawColumns(['aksi', 'deskripsi'])->toJson();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_kota' => 'required',
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return redirect()->back()->withErrors($fieldsWithErrorMessagesArray)->withInput();
        }

        $input = Kota::create($request->all());
        if(!$validator->fails()){
            return redirect()->route('admin.kota')->with('success', 'Data berhasil disimpan');
        }else{
            return redirect()->route('admin.kota')->withErrors('error',$validator);
        }
    }

    public function edit(Request $request, $id){
        $selectedItem = Kota::find($id);
        return response()->json($selectedItem);
    }

    public function update(Request $request, $id){
        $data = Kota::find($id);
        $validator = Validator::make($request->all(), [
            'nama_kota' => 'required',
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return redirect()->back()->withErrors($fieldsWithErrorMessagesArray)->withInput();
        }

        $update = $data->update($request->all());
        return redirect()->route('admin.kota')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id){
        $data = Kota::find($id);
        if($data->delete()){
            return response()->json(['status' => 'success','message'=>'Data deleted successfully.']);
        }else{
            return response()->json(['status'=>'error', 'message' => 'failed to delete Data']);
        }
    }
}
