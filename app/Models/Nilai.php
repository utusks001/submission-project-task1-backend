<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Mapel;

class Nilai extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'nilai';

    protected $guarded = ['id'];
    // protected $fillable = protected $fillable = ['id_siswa', 'id_mapel', 'nilaiLs1', 'nilaiLs2', 'nilaiLs3', 
    //                                              'nilaiLs4', 'nilaiUh1', 'nilaiUh2', 'nilaiUts', 'nilaiUs'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
