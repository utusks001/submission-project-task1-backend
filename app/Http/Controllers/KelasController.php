<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KelasResource;
use App\Http\Resources\PerKelasResource;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $data = PerKelasResource::collection(Kelas::all());
        $data_json = response()->json($data, 200);
        return $data_json;
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
            'kapasitas' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Data yang diberikan tidak valid.",
                "errors" => $validator->errors()->toArray(),
            ], 422);
        }
        else {
            $data['kapasitas'] = (int) $data['kapasitas'];
            $kelas = Kelas::create($data);
            return response()->json(new PerKelasResource($kelas), 201);
        }
    }

    public function show($id)
    {
        try
        {   
            $kelas = Kelas::findOrFail($id);
            $data = new KelasResource($kelas);
            //     $data = new PerKelasResource($kelas);
            $data_json = response()->json($data, 200);
            return $data_json;
        }
        catch(\Exception $e)
        {
            return response()->json([
                "message" => "Id yang diberikan tidak valid.",
                "error" => "Kelas yang dimasukkan tidak ditemukan",
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'nama_kelas' => 'nullable|unique:kelas,nama_kelas',
            'kapasitas' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Data yang diberikan tidak valid.",
                "errors" => $validator->errors()->toArray(),
            ], 422);
        }
        else {
            try 
            {
                $kelas = Kelas::findOrFail($id);
                $kelas->nama_kelas = $request->nama_kelas ? $request->nama_kelas : $kelas->nama_kelas;
                $kelas->kapasitas = $request->kapasitas ? (int) $request->kapasitas : $kelas->kapasitas;
                $status = $kelas->save();
                if ($kelas->save()) {
                    return response()->json(new PerKelasResource($kelas), 201);
                }
                else {
                    return response()->json(["result" => "failed"], 400);
                }
            }
            catch(\Exception $e)
            {
                return response()->json([
                    "message" => "Id yang diberikan tidak valid.",
                    "error" => "Kelas yang dimasukkan tidak ditemukan",
                ], 404);
            }
        }
    }
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return response()->json(null, 204);
    }

}
