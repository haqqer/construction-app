<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'full_name' => 'super admin',
                'username' => 'admin',
                'email' => 'admin@email.com',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('users')->insert(
            [
                'full_name' => 'pimpinan proyek',
                'username' => 'pimpinan',
                'email' => 'pimpinan@email.com',
                'role' => 'pimpinan',
                'password' => Hash::make('pimpinan123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('users')->insert(
            [
                'full_name' => 'petugas proyek',
                'username' => 'petugas',
                'email' => 'petugas@email.com',
                'role' => 'petugas',
                'password' => Hash::make('petugas123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()                
            ]
        );
    }
}
