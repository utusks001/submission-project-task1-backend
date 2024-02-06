<?php

namespace Database\Seeders;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Kelas;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectId;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // Create faker
        $faker = Faker::create();

        // Add data to kelas table
        for ($i = 1; $i <= 2; $i++){
            for ($j = 1; $j <= 2; $j++){
                Kelas::create([
                    'nama_kelas' => 'Kelas ' . $i . '-' . chr(64 + $j),
                    'kapasitas' => 35,
                ]);
            }
        }

        // Add data to siswa table
        $kelasIDs = Kelas::pluck('_id');
        for ($i = 1; $i <= 10; $i++){
            Siswa::create([
                'nama_kelas' => $faker->firstName() . ' ' . $faker->lastName(),
                // 'id_kelas' => new ObjectId($faker->randomElement($kelasIDs)),
                'id_kelas' => (string) ($faker->randomElement($kelasIDs)),
            ]);
        }

        // Add data to mapels table
        $mapels = [
            ['nama_mapel' => 'Matematika'],
            ['nama_mapel' => 'IPA'],
            ['nama_mapel' => 'IPS'],
            ['nama_mapel' => 'Komputer'],
            ['nama_mapel' => 'Bahasa Inggris'],
        ];
        foreach ($mapels as $mapel){
            mapel::create([
                'nama_mapel' => $mapel['nama_mapel'],
            ]);
        }
        
        // Add data to nilai table
        $siswaIDs = siswa::pluck('_id');
        $mapelIDs = mapel::pluck('_id');
        foreach ($mapelIDs as $mapelID){
            nilai::create([
                // 'id_siswa' => new ObjectId($siswaIDs[0]),
                // 'id_mapel' => new ObjectId($mapelID),
                'id_siswa' => (string) ($siswaIDs[0]),
                'id_mapel' => (string) ($mapelID),
                'nilaiLs1' => (float) $faker->numberBetween(50, 100),
                'nilaiLs2' => (float) $faker->numberBetween(50, 100),
                'nilaiLs3' => (float) $faker->numberBetween(50, 100),
                'nilaiLs4' => (float) $faker->numberBetween(50, 100),
                'nilaiUh1' => (float) $faker->numberBetween(50, 100),
                'nilaiUh2' => (float) $faker->numberBetween(50, 100),
                'nilaiUts' => (float) $faker->numberBetween(50, 100),
                'nilaiUs' => (float) $faker->numberBetween(50, 100),
            ]);
        }
    }
}