<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert(
            [
                'name' => 'Project Jalan',
                'description' => 'Project Jalan Besar',
                'start' => date("Y-m-d H:i:s"),
                'end' => date("2020-01-01 12:00:00"),
                'status' => 'undone',
                'latitude' => 0.1,
                'longitude' => 1.1,
                'photo_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('projects')->insert(
            [
                'name' => 'Project Jembatan',
                'description' => 'Project Jembatan Raya',
                'start' => date("Y-m-d H:i:s"),
                'end' => date("2020-02-02 12:00:00"),
                'status' => 'undone',
                'latitude' => 0.2,
                'longitude' => 1.2,
                'photo_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('projects')->insert(
            [
                'name' => 'Project Bendungan',
                'description' => 'Project Bendungan Gede',
                'start' => date("Y-m-d H:i:s"),
                'end' => date("2020-03-03 12:00:00"),
                'status' => 'done',
                'latitude' => 0.2,
                'longitude' => 1.2,
                'photo_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }
}
