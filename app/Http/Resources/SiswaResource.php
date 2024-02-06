<?php

namespace App\Http\Resources;

use App\Models\Nilai;
use MongoDB\BSON\ObjectId;
use App\Http\Resources\NilaiAkhirResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request)
    {
        // $nilai = Nilai::where('id_siswa', '=', new ObjectId($this->_id))->get();
        $nilai = Nilai::where('id_siswa', '=', (string) ($this->_id))->get();
        return [
            '_id' => $this->_id,
            'nama_siswa' => $this->nama_siswa,
            'nama_kelas' => $this->kelas->nama_kelas,
            'nilai' => NilaiAkhirResource::collection($nilai),
        ];
    }
}