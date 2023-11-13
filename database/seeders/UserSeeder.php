<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'name'     => 'ADMIN',
			'email'    => 'admin@test.com',
			'password' => Hash::make("password"),
            'tmp_folder_name' => uniqid().'-'.now()->timestamp,
			// 'password_verified_at' => Carbon::now(),
        ]);
        $admin->assignRole('admin');

        $customer = User::firstOrCreate([
            'name'     => 'Customer Test',
			'email'    => 'customer@test.com',
			'password' => Hash::make("password"),
            'tmp_folder_name' => uniqid().'-'.now()->timestamp,
			// 'password_verified_at' => Carbon::now(),
        ]);
        $customer->assignRole('customer');
    }
}
