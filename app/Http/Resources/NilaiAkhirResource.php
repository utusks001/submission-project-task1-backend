<?php

namespace App\Http\Resources;

use App\Helpers\HitungNilai;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NilaiAkhirResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request)
    {
        $nilaiLs = array($this->nilaiLs1, $this->nilaiLs2, $this->nilaiLs3, $this->nilaiLs4);
        $nilaiUh = array($this->nilaiUh1, $this->nilaiUh2);
        $nilai = new HitungNilai($nilaiLs, $nilaiUh, $this->nilaiUts, $this->nilaiUs);
        return [
            'nama_mapel' => $this->mapel->nama_mapel,
            'nilai_akhir' => $nilai->hitung(),
        ];
    }
}