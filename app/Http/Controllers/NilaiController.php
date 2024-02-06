<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\NilaiResource;
use MongoDB\BSON\ObjectId;
use Illuminate\Support\Facades\Validator;

class NilaiController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'id_siswa' => 'required|exists:siswa,_id',
            'id_mapel' => 'required|exists:mapel,_id',
            'nilaiLs1' => 'required|numeric|min:0|max:100',
            'nilaiLs2' => 'required|numeric|min:0|max:100',
            'nilaiLs3' => 'required|numeric|min:0|max:100',
            'nilaiLs4' => 'required|numeric|min:0|max:100',
            'nilaiUh1' => 'required|numeric|min:0|max:100',
            'nilaiUh2' => 'required|numeric|min:0|max:100',
            'nilaiUts' => 'required|numeric|min:0|max:100',
            'nilaiUs' => 'required|numeric|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Data yang diberikan tidak valid.",
                "errors" => $validator->errors()->toArray(),
            ], 422);
        }
        else {
            $data['id_siswa'] = (string)($data['id_siswa']);
            $data['id_mapel'] = (string)($data['id_mapel']);
            // $data['id_siswa'] = new ObjectId($data['id_siswa']);
            // $data['id_mapel'] = new ObjectId($data['id_mapel']);
            $data['nilaiLs1'] = (float) $data['nilaiLs1'];
            $data['nilaiLs2'] = (float) $data['nilaiLs2'];
            $data['nilaiLs3'] = (float) $data['nilaiLs3'];
            $data['nilaiLs4'] = (float) $data['nilaiLs4'];
            $data['nilaiUh1'] = (float) $data['nilaiUh1'];
            $data['nilaiUh2'] = (float) $data['nilaiUh2'];
            $data['nilaiUts'] = (float) $data['nilaiUts'];
            $data['nilaiUs'] = (float) $data['nilaiUs'];
            $nilai = Nilai::create($data);
            return response()->json(new NilaiResource($nilai), 201);
        }
    }

    public function show($id)
    {
        try
        {  
            $nilai = Nilai::findOrFail($id);
            $data = new NilaiResource($nilai);
            $data_json = response()->json($data, 200);
            return $data_json;
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json([
                "message" => "Id yang diberikan tidak valid.",
                "error" => "Nilai yang dimasukkan tidak ditemukan",
            ], 404);
        }
    }
}