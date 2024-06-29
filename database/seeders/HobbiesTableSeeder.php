<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HobbiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobbies')->truncate();
        DB::table('hobbies')->insert(
            [
                'id' => 1,
                'name' => 'Football',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 2,
                'name' => 'Badminton',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 3,
                'name' => 'Boxing',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 4,
                'name' => 'Cycling',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 5,
                'name' => 'Swimming',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 6,
                'name' => 'Singing',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 7,
                'name' => 'Music',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 8,
                'name' => 'Dancing',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 9,
                'name' => 'Reading',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 10,
                'name' => 'Cooking',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 11,
                'name' => 'Movies',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('hobbies')->insert(
            [
                'id' => 12,
                'name' => 'Guitar',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
    }
}
