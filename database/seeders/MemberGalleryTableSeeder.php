<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_gallery')->truncate();
        DB::table('member_gallery')->insert(
            [
                'id' => 1,
                'member_id' => '1',
                'name' => '202405121102186640859a2e05c_jennie.jpeg',
                'sort' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 2,
                'member_id' => '1',
                'name' => '202405121102186640859a48e69_jennie5.jpg',
                'sort' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 3,
                'member_id' => '1',
                'name' => '202405121102186640859a471d5_jennie1.jpg',
                'sort' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 4,
                'member_id' => '1',
                'name' => '202405121102186640859a482d0_jennie3.jpg',
                'sort' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 5,
                'member_id' => '1',
                'name' => '202405121102186640859a488e8_jennie4.jpg',
                'sort' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 6,
                'member_id' => '1',
                'name' => '202405121102186640859a47932_jennie2.jpg',
                'sort' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 7,
                'member_id' => '2',
                'name' => '202405121108436640871b2bb8c_lisa.jpg',
                'sort' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 2,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 2
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 8,
                'member_id' => '2',
                'name' => '202405121108436640871b4dc4b_lisa2.jpg',
                'sort' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 2,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 2
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 9,
                'member_id' => '2',
                'name' => '202405121108436640871b4e04b_lisa3.jpg',
                'sort' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 2,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 2
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 10,
                'member_id' => '2',
                'name' => '202405121108436640871b4e594_lisa1.jpg',
                'sort' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 2,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 2
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 11,
                'member_id' => '2',
                'name' => '202405121108436640871b4ea08_lisa4.jpg',
                'sort' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 2,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 2
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 12,
                'member_id' => '2',
                'name' => '202405121108436640871b4ef36_lisa5.jpg',
                'sort' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 2,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 2
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 13,
                'member_id' => '3',
                'name' => '2024051211165066408902dea2d_jisoo5.jpg',
                'sort' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 3,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 3
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 14,
                'member_id' => '3',
                'name' => '20240512111651664089032dee1_jisoo3.jpeg',
                'sort' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 3,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 3
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 15,
                'member_id' => '3',
                'name' => '20240512111651664089032e7c5_jisoo2.jpg',
                'sort' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 3,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 3
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 16,
                'member_id' => '3',
                'name' => '20240512111651664089032f2d6_jisoo.jpeg',
                'sort' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 3,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 3
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 17,
                'member_id' => '3',
                'name' => '2024051211165166408903287ea_jisoo1.jpg',
                'sort' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 3,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 3
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 18,
                'member_id' => '3',
                'name' => '202405121116516640890329225_jisoo4.webp',
                'sort' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 3,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 3
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 19,
                'member_id' => '4',
                'name' => '2024051211224966408a69a9e81_rose.jpg',
                'sort' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 4,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 4
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 20,
                'member_id' => '4',
                'name' => '2024051211224966408a69ef2c2_rose2.jpg',
                'sort' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 4,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 4
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 21,
                'member_id' => '4',
                'name' => '2024051211224966408a69ef86c_rose3.jpg',
                'sort' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 4,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 4
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 22,
                'member_id' => '4',
                'name' => '2024051211224966408a69effd0_rose5.jpg',
                'sort' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 4,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 4
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 23,
                'member_id' => '4',
                'name' => '2024051211224966408a69f0b2e_rose1.jpg',
                'sort' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 4,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 4
            ]
        );
        DB::table('member_gallery')->insert(
            [
                'id' => 24,
                'member_id' => '4',
                'name' => '2024051211224966408a69f0597_rose4.jpg',
                'sort' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 4,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 4
            ]
        );
    }
}
