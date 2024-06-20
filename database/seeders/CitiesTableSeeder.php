<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();
        DB::table('cities')->insert(
            [
                'id' => 1,
                'name' => 'Yangon',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 2,
                'name' => 'Mandalay',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 3,
                'name' => 'Naypyitaw',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 4,
                'name' => 'Taunggyi',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 5,
                'name' => 'Myitkyina',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 6,
                'name' => 'Bago',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 7,
                'name' => 'Loikaw',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 8,
                'name' => 'Hpa-An',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 9,
                'name' => 'Sittwe',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 10,
                'name' => 'Dawei',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 11,
                'name' => 'Mawlamyine',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 12,
                'name' => 'Hakha',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 13,
                'name' => 'Monywa',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 14,
                'name' => 'Magway',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );

        DB::table('cities')->insert(
            [
                'id' => 15,
                'name' => 'Pathein',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
    }
}
