<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaResource;
use App\Http\Resources\PerSiswaResource;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $data = PerSiswaResource::collection(Siswa::all());
        $data_json = response()->json($data, 200);
        return $data_json;
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama_siswa' => 'required|unique:siswa,nama_siswa',
            'id_kelas' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Data yang diberikan tidak valid.",
                "errors" => $validator->errors()->toArray(),
            ], 422);
        }
        else {
            $siswa = Siswa::create($data);
            return response()->json($siswa, 201);
        }
    }


    public function show($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $data = new SiswaResource($siswa);
            $data_json = response()->json($data, 200);
            return $data_json;
        } 
        catch (\Exception $e) {
            return response()->json([
                "message" => "Id yang diberikan tidak valid.",
                "error" => "Siswa yang dimasukkan tidak ditemukan",
            ], 404);
        }
    }
}