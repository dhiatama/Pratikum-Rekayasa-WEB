<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function read()
    {
        $model=new Dosen();
    
        if(!$datax=$model ->all()) {
            $success=false;
            $message = "Database Eror";
        }
        
        foreach($datax as $dt) {
            $data[]=[
                'nidn'=>$dt->nidn,
                'nama'=>$dt->nama,
                'alamat'=>$dt->alamat,
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
            $model=new Dosen();
            $model->nidn=$req->nidn;
            $model->nama=$req->nama;
            $model->alamat=$req->alamat;
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
    
        public function update(Request $request, $nidn)
        {
            $dosen = Dosen::find($nidn);
            if (!$dosen) {
                return response()->json(['message' => 'Dosen not found'], 404);
            }
    
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'jurusan' => 'required',
            ]);
    
            $dosen->update($request->all());
    
            return response()->json(['message' => 'Dosen updated successfully', 'dosen' => $dosen]);
        }
    
        public function destroy($nidn)
        {
            $dosen = Dosen::find($nidn);
            if (!$dosen) {
                return response()->json(['message' => 'Dosen not found'], 404);
            }
    
            $dosen->delete();
    
            return response()->json(['message' => 'Dosen deleted successfully']);
        }
    }