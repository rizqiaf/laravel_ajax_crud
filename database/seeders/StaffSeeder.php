<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            'nama' => Str::random(10),
            'nik' => Str::random(10),
            'jabatan' => Str::random(10),
            'alamat' => Str::random(10),
            'no_tlp' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            
        ]);
    }
}
