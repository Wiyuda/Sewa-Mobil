<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Wiyuda Pratama Mahardia',
            'sim' => '07180001000176',
            'no_telp' => '082284579426',
            'alamat' => 'jln.sisingamangaraja, gg.sepakat, kota medan',
            'password' => Hash::make('wiyuda19'),
        ]);

        $admin->assignRole('admin');
    }
}
