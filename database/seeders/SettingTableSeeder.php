<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->truncate();
        DB::table('setting')->insert(
            [
                'id' => 1,
                'point' => 1000,
                'company_name' => 'Myanmar Cupid',
                'company_logo'   => '2024050604044566383abd55ebc_cupid.jpg',
                'company_email' => 'mmcupid@gmail.com',
                'company_phone' => '0969936530',
                'company_address' => 'No. 123, Banana Street, North Okkalapa, Yangon',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
    }
}
