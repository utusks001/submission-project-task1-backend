<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nilai;
use App\Models\Kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'siswa';
                 
    protected $guarded = ['id'];
    // protected $fillable = ["nama_siswa", "id_kelas"];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    } 

    // public function mapel()
    // {
    //     return $this->hasMany(Mapel::class);
    // }
}
