<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NilaiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request)
    {
        return [
            'nama_siswa' => $this->siswa->nama_siswa,
            'nama_mapel' => $this->mapel->nama_mapel,
            'nilaiLs1' => $this->nilaiLs1,
            'nilaiLs2' => $this->nilaiLs2,
            'nilaiLs3' => $this->nilaiLs3,
            'nilaiLs4' => $this->nilaiLs4,
            'nilaiUh1' => $this->nilaiUh1,
            'nilaiUh2' => $this->nilaiUh2,
            'nilaiUts' => $this->nilaiUts,
            'nilaiUs' => $this->nilaiUs,
        ];
    }
}
