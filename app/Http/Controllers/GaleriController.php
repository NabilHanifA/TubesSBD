<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class GaleriController extends Controller
{
    public function index(){
        return view('admin.galeri');
    }

    public function ajax(){
        $data = Galeri::latest()->get();
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
            'judul' => 'required',
            'img'   => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return redirect()->back()->withErrors($fieldsWithErrorMessagesArray)->withInput();
        }

        $input = Galeri::create($request->all());
        if($request->hasFile('img')){
            $file =  $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->storeAs('galeri/', $filename, 'public');
            $input->img = $filename;
            $input->save();
        }
        if(!$validator->fails()){
            return redirect()->route('admin.galeri')->with('success', 'Data berhasil disimpan');
        }else{
            return redirect()->route('admin.galeri')->withErrors('error',$validator);
        }
    }

    public function edit(Request $request, $id){
        $selectedItem = Galeri::find($id);
        return response()->json($selectedItem);
    }

    public function update(Request $request, $id){
        $data = Galeri::find($id);
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
        if($request->hasFile('img')){
            $file =  $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->storeAs('galeri', $filename, 'public');
            $data->img = $filename;
            $data->update();
            Storage::disk('public')->delete($former);
        }
        return redirect()->route('admin.galeri')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id){
        $data = Galeri::find($id);
        $img = "galeri/" . $data->img;
        if($data->delete()){
            Storage::disk('public')->delete($img);
            return response()->json(['status' => 'success','message'=>'Data deleted successfully.']);
        }else{
            return response()->json(['status'=>'error', 'message' => 'failed to delete Data']);
        }
    }
}
