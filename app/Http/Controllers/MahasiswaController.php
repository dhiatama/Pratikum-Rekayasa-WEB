<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function read()
    {
        $model=new Mahasiswa();
   
      if($datax=$model->all()) {
        $success=false;
        $message= "Database Error";
    }
        foreach($datax as $dt) {
            $data[]=[
                'nim'=>$dt->nim,
                'nama'=>$dt->nama,
                'umur'=>$dt->umur,
                'alamat'=>$dt->alamat,
                'kota'=>$dt->kota,
                'kelas'=>$dt->kelas,
                'jurusan'=>$dt->jurusan
            ];
        }
        if (!empty($data)) {
            $success = true;
            $message = "Data berhasil dibaca";
        } else
            {
                $success=false;
                $message = "Data tidak ditemukan/kosong";
            }
        $balikan = [
            "success"=>$success,
            "message"=>$message,
            "data"=>@$data

        ];
        return response() -> json($balikan);
    }
    
    public function create(Request $req)
    {
        $model=new Mahasiswa();
        $model->nim=$req->nim;
        $model->nama=$req->nama;
        $model->umur=$req->umur;
        $model->alamat=$req->alamat;
        $model->kota=$req->kota;
        $model->kelas=$kelas->kelas;
        $model->jurusan=$jurusan->jurusan;
        if($model->save()) {
                $success=true;
                $message="Data berhasil disimpan";
        } else 
        {
               $success=false;
               $message="Data gagal disimpan"; 
        }

        $balikan = [
            "success"=>$success,
            "message"=>$mesage,
            "data"=>@$req->all()
        ];
        return response()->json($balikan);
    }
}
