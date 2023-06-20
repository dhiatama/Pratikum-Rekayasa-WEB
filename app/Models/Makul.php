<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    use HasFactory;
    public $table = "makul"; // custom nama tabel
    protected $primaryKey = "id"; // custom primary key
    public $incrementing=false; // mematikan auto increment
    protected $keyType="string"; // custom type primary key (defaultnya autoincreme
    protected $fillable = ['id', 'nama', 'pengajar','jurusan'];
}
