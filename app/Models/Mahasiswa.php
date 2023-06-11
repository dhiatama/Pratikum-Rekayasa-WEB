<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $table = "mahasiswa";// custom nama tabel
    protected $primaryKey = "nim";
    public $incrementing=false;
    protected $keyType="string";
    protected $fillable = ['nim', 'nama', 'alamat', 'kota', 'kelas', 'jurusan'];
}
