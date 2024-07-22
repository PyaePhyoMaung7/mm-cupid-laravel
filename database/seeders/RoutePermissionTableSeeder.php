<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoutePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('route_permission')->truncate();
        DB::table('route_permission')->insert([
            'id' => 1,
            'name' => 'admin-backend/index',
            'role' => 1
        ]);

        DB::table('route_permission')->insert([
            'id' => 2,
            'name' => 'admin-backend/index',
            'role' => 2
        ]);

        DB::table('route_permission')->insert([
            'id' => 3,
            'name' => 'admin-backend/index',
            'role' => 3
        ]);

        DB::table('route_permission')->insert([
            'id' => 4,
            'name' => 'admin-backend/city',
            'role' => 1
        ]);

        DB::table('route_permission')->insert([
            'id' => 5,
            'name' => 'admin-backend/hobby',
            'role' => 1
        ]);

        DB::table('route_permission')->insert([
            'id' => 6,
            'name' => 'admin-backend/user',
            'role' => 1
        ]);

        DB::table('route_permission')->insert([
            'id' => 7,
            'name' => 'admin-backend/setting',
            'role' => 1
        ]);

        DB::table('route_permission')->insert([
            'id' => 8,
            'name' => 'admin-backend/member',
            'role' => 1
        ]);

        DB::table('route_permission')->insert([
            'id' => 9,
            'name' => 'admin-backend/transaction',
            'role' => 1
        ]);

    }
}
