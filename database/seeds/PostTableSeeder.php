<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                'project_id' => 1,
                'user_id' => 2,
                'title' => 'permasalahan tentang perancah',
                'description' => 'perancah merupakan salah satu alat yang krusial pada pembangunan ...',
                'photo_id' => 0,
                'type' => 'quality',
                'status' => 'unsolved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('posts')->insert(
            [
                'project_id' => 1,
                'user_id' => 3,
                'title' => 'alat keselamatan tidak standar',
                'description' => 'alat keselamatan aspek utama dalam pengerjaan proyek',
                'photo_id' => 0,
                'type' => 'safety',
                'status' => 'unsolved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('posts')->insert(
            [
                'project_id' => 2,
                'user_id' => 3,
                'title' => 'truk semen',
                'description' => 'truk semen datang ke lokasi proyek',
                'photo_id' => 0,
                'type' => 'progress',
                'status' => 'unsolved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }
}
