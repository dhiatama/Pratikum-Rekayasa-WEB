<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function read()
{
    $model=new Makul();

    if(!$datax=$model ->all()) {
        $success=false;
        $message = "Database Eror";
    }
    
    foreach($datax as $dt) {
        $data[]=[
            'id'=>$dt->id,
            'nama'=>$dt->nama,
            'pengajar'=>$dt->pengajar,
            'jurusan'=>$dt->jurusan,

        ];
    }
    if (!empty($data)) {
        $success = true;
        $message = "Data berhasil dibaca";
    } else
        {
            $success = false;
            $message = "Data tidak ditemukan/kosong";
        }
    $balikan = [
        "success"=> $success,
        "message"=> $message,
        "data"=> @$data

    ];

    return response() -> json($balikan);
    }


    public function create(Request $req)
    {
        $model=new Makul();
        $model->id=$req->id;
        $model->nama=$req->nama;
        $model->pengajar=$req->pengajar;
        $model->jurusan=$req->jurusan;
        if($model->save()) {
            $success=true;
            $message="Data berhasil disimpan";
        }

        $balikan = [
            "success"=>$success,
            "message"=>$message,
            "data" => @$req->all()
        ];

        return response() ->json($balikan);
    }

    public function update(Request $request, $id)
    {
        $makul = Makul::find($id);
        if (!$makul) {
            return response()->json(['message' => 'Makul not found'], 404);
        }

        $request->validate([
            'nama' => 'required',
            'pengajar' => 'required',
            'jurusan' => 'required',
        ]);

        $makul->update($request->all());

        return response()->json(['message' => 'Makul updated successfully', 'makul' => $makul]);
    }

    public function destroy($id)
    {
        $makul = Makul::find($id);
        if (!$makul) {
            return response()->json(['message' => 'Makul not found'], 404);
        }

        $makul->delete();

        return response()->json(['message' => 'Makul deleted successfully']);
    }
}