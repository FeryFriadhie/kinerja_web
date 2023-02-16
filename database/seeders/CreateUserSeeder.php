<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DataPegawai;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'verifikator_id' => '0',
                'peg_verifikator_id' => '0',
                'id_pegawai' => '1',
                'nama_pegawai' => 'Oktaviani Rianti',
                'email' => 'admin@gmail.com',
                'role' => '3',
                'password' => bcrypt('ekinerja2023'),
            ],
            // [
            //     'verifikator_id' => '2',
            //     'peg_verifikator_id' => '0',
            //     'id_pegawai' => '1',
            //     'nama_pegawai' => 'Drs. Yayat Suratman, M.Pd',
            //     'email' => 'verif1@gmail.com',
            //     'role' => '1',
            //     'password' => bcrypt('ekinerja2023'),
            // ],
            // [
            //     'verifikator_id' => '2',
            //     'peg_verifikator_id' => '0',
            //     'id_pegawai' => '2',
            //     'nama_pegawai' => 'Drs. Budi Nugraha, M.Pd',
            //     'email' => 'verif2@gmail.com',
            //     'role' => '1',
            //     'password' => bcrypt('ekinerja2023'),
            // ],
            // [
            //     'verifikator_id' => '3',
            //     'peg_verifikator_id' => '1',
            //     'id_pegawai' => '1',
            //     'nama_pegawai' => 'Yati Setiawati, S.Ag',
            //     'email' => 'member1@gmail.com',
            //     'role' => '0',
            //     'password' => bcrypt('ekinerja2023'),
            // ],
            // [
            //     'verifikator_id' => '3',
            //     'peg_verifikator_id' => '2',
            //     'id_pegawai' => '1',
            //     'nama_pegawai' => 'Yeyet Rohaeti',
            //     'email' => 'member2@gmail.com',
            //     'role' => '0',
            //     'password' => bcrypt('ekinerja2023'),
            // ],
            
        ];

        foreach ($users as $key => $user) 
        {
            DataPegawai::create($user);
        }

    }
}
