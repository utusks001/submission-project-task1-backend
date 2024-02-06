<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Siswa;
use MongoDB\BSON\ObjectId;

class KelasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request)
    {
        // $siswa = Siswa::select(['_id', 'nama_siswa'])->where('id_kelas', '=', new ObjectId($this->_id))->get();
        $siswa = Siswa::select(['_id', 'nama_siswa'])->where('id_kelas', '=', (string)($this->_id))->get();
        return [
            '_id' => $this->_id,
            'nama_siswa' => $this->nama_siswa,
            'kapasitas' => $this->kapasitas,
            'siswa' => $siswa,
        ];
    }
}
