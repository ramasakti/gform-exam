<?php

namespace Database\Seeders;
use DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'username' => 'hasanrifai',
                'password' => bcrypt('hasanrifai'),
                'nama' => 'M. Hasan Rifai, M.Pd',
                'status' => 'Admin',
                'kelas' => '',
                'ruang' => '',
                'log' => NULL
            ]);

        $character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '9',
                'paralel' => 'A',
                'walas' => 'hasanrifai'
            ]);
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '9',
                'paralel' => 'B',
                'walas' => 'hasanrifai'
            ]);
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '9',
                'paralel' => 'C',
                'walas' => 'hasanrifai'
            ]);
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '8',
                'paralel' => 'A',
                'walas' => 'hasanrifai'
            ]);
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '8',
                'paralel' => 'B',
                'walas' => 'hasanrifai'
            ]);
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '8',
                'paralel' => 'C',
                'walas' => 'hasanrifai'
            ]);
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '7',
                'paralel' => 'A',
                'walas' => 'hasanrifai'
            ]);
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '7',
                'paralel' => 'B',
                'walas' => 'hasanrifai'
            ]);
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => '7',
                'paralel' => 'C',
                'walas' => 'hasanrifai'
            ]);
    }
}
