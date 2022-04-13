<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nim',
        'Nama',
        'Kelas',
        'Jurusan',
        'Jenis_Kelamin',
        'Email',
        'Alamat',
        'Tanggal_Lahir'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mahasiswa_matakuliah()
    {
        return $this->belongsToMany(Mahasiswa_MataKuliah::class);
    }
}
