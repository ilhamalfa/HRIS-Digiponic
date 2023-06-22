<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nik' => 7708181057,
            'nama' => 'Niskala Liam',
            'email' => 's.admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin123'),
            'role' => 'SuperAdmin',
            'jumlah_cuti' => 14,
            'tanggal_lahir' => '1999-03-22',
            'umur' => 24,
            'jenis_kelamin' => 'Laki-laki',
            'nomor_hp' => '081216110775',
            'status_pernikahan' => 'Lajang',
            'jumlah_anak' => 0,
            'department' => 'Human Resource',
            'golongan' => 'Manager/Kadep',
            'alamat' => 'Dsn Ngetrep',
            'province_id' => 35,
            'regency_id' => 3516,
            'district_id' => 3516050,
            'village_id' => 3516050011,
            'digital_signature' => 'Test'
        ]);

        User::create([
            'nik' => 7708181058,
            'nama' => 'Candra Putra',
            'email' => 'pegawai@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('pegawai123'),
            'role' => 'Pegawai',
            'jumlah_cuti' => 14,
            'tanggal_lahir' => '1999-03-22',
            'umur' => 24,
            'jenis_kelamin' => 'Laki-laki',
            'nomor_hp' => '081216110776',
            'status_pernikahan' => 'Lajang',
            'jumlah_anak' => 0,
            'department' => 'Production',
            'golongan' => 'Operator',
            'alamat' => 'Dsn Ngetrep',
            'province_id' => 35,
            'regency_id' => 3516,
            'district_id' => 3516050,
            'village_id' => 3516050011,
            'digital_signature' => 'Test'
        ]);
    }
}
