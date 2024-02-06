<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nilai;

class Mapel extends Model
{
    use HasFactory;    
    
    protected $connection = 'mongodb';
    protected $collection = 'mapel';

    protected $guarded = ['id'];
    // protected $fillable = ['nama_mapel'];
    
    // public function nilai()
    // {
    //     return $this->hasMany(Nilai::class);
    // }
}
