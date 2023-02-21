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
            [
                'verifikator_id' => '3',
                'peg_verifikator_id' => '1',
                'id_pegawai' => '12',
                'nama_pegawai' => 'Arif Zapar Sidik. ST.',
                'email' => 'member2@gmail.com',
                'role' => '0',
                'password' => bcrypt('ekinerja2023'),
            ],
            [
                'verifikator_id' => '3',
                'peg_verifikator_id' => '1',
                'id_pegawai' => '13',
                'nama_pegawai' => 'Iip Masripah, S.Ag',
                'email' => 'member3@gmail.com',
                'role' => '0',
                'password' => bcrypt('ekinerja2023'),
            ],
            [
                'verifikator_id' => '3',
                'peg_verifikator_id' => '1',
                'id_pegawai' => '14',
                'nama_pegawai' => 'Aziz Muslim, S.Pd',
                'email' => 'member4@gmail.com',
                'role' => '0',
                'password' => bcrypt('ekinerja2023'),
            ],
            [
                'verifikator_id' => '3',
                'peg_verifikator_id' => '1',
                'id_pegawai' => '15',
                'nama_pegawai' => 'Nina, S.Pd',
                'email' => 'member5@gmail.com',
                'role' => '0',
                'password' => bcrypt('ekinerja2023'),
            ],
            [
                'verifikator_id' => '3',
                'peg_verifikator_id' => '2',
                'id_pegawai' => '17',
                'nama_pegawai' => 'Teti Sri Mulyati Hidayat, S.Pd',
                'email' => 'member7@gmail.com',
                'role' => '0',
                'password' => bcrypt('ekinerja2023'),
            ], 
            [
                'verifikator_id' => '3',
                'peg_verifikator_id' => '2',
                'id_pegawai' => '18',
                'nama_pegawai' => 'Ane Maryani, S.Pd',
                'email' => 'member8@gmail.com',
                'role' => '0',
                'password' => bcrypt('ekinerja2023'),
            ], 
            [
                'verifikator_id' => '3',
                'peg_verifikator_id' => '2',
                'id_pegawai' => '19',
                'nama_pegawai' => 'Yeni Mulyaningsih, S.Si',
                'email' => 'member9@gmail.com',
                'role' => '0',
                'password' => bcrypt('ekinerja2023'),
            ], 
            [
                'verifikator_id' => '3',
                'peg_verifikator_id' => '2',
                'id_pegawai' => '20',
                'nama_pegawai' => 'Amirudin, S.Pd',
                'email' => 'member10@gmail.com',
                'role' => '0',
                'password' => bcrypt('ekinerja2023'),
            ],
            
        ];

        foreach ($users as $key => $user) 
        {
            DataPegawai::create($user);
        }

    }
}
