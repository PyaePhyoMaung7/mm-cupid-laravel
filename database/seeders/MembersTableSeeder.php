<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->truncate();

        Member::factory()->count(50)->create();

        // DB::table('members')->insert(
        //     [
        //         'id' => 1,
        //         'username' => 'Shwe Phyo Kywe',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'shweshwe@gmail.com',
        //         'phone' => '09876544667',
        //         'email_confirm_code' => '32b1c5e6fcd58b69cca1b25b7f64f7d8',
        //         'gender' => 1,
        //         'date_of_birth' => '1995-11-06',
        //         'education' => 'College',
        //         'city_id' => 1,
        //         'height_feet' => 5,
        //         'height_inches' => 10,
        //         'status' => 2,
        //         // 'love_status' =>
        //         'about' => 'love puppies',
        //         'partner_gender' => 2,
        //         'partner_min_age' => 24,
        //         'partner_max_age' => 32,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'teacher',
        //         'religion' => 1,
        //         'thumbnail' => '20240512110218_6640859a30245_thumb_jennie.jpeg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 2,
        //         'username' => 'Khin Khin',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'khinkhin@gmail.com',
        //         'phone' => '09987654657',
        //         'email_confirm_code' => 'a4093a241576088dba61c8fef669ad38',
        //         'gender' => 1,
        //         'date_of_birth' => '2003-09-22',
        //         'education' => 'College',
        //         'city_id' => 2,
        //         'height_feet' => 5,
        //         'height_inches' => 4,
        //         'status' => 4,
        //         // 'love_status' =>
        //         'about' => 'love kitties',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 19,
        //         'partner_max_age' => 26,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 1,
        //         'thumbnail' => '20240512110843_6640871b2da2b_thumb_lisa.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 3,
        //         'username' => 'Zin Zin',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'zinzin@gmail.com',
        //         'phone' => '098976545',
        //         'email_confirm_code' => '9ad3dba2611d72e07c34b76f02460b72',
        //         'gender' => 1,
        //         'date_of_birth' => '2002-01-16',
        //         'education' => 'College',
        //         'city_id' => 3,
        //         'height_feet' => 5,
        //         'height_inches' => 3,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love nature',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 19,
        //         'partner_max_age' => 26,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 2,
        //         'thumbnail' => '20240512111650_66408902e0f23_thumb_jisoo5.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 4,
        //         'username' => 'Yamin',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'yamin@gmail.com',
        //         'phone' => '09765578890',
        //         'email_confirm_code' => 'a7ebe0bdf2b2894c12d902f8db74c099',
        //         'gender' => 1,
        //         'date_of_birth' => '2003-02-12',
        //         'education' => 'College',
        //         'city_id' => 4,
        //         'height_feet' => 5,
        //         'height_inches' => 4,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love cats',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 21,
        //         'partner_max_age' => 28,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 4,
        //         'thumbnail' => '20240512112249_66408a69af23d_thumb_rose.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 5,
        //         'username' => 'Kyaw Kyaw',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'kyawkyaw@gmail.com',
        //         'phone' => '0987654567',
        //         'email_confirm_code' => '6445233c155e50fec982c6803ffc1305',
        //         'gender' => 0,
        //         'date_of_birth' => '2002-01-26',
        //         'education' => 'bachelor',
        //         'city_id' => 5,
        //         'height_feet' => 5,
        //         'height_inches' => 8,
        //         'status' => 4,
        //         // 'love_status' =>
        //         'about' => 'love camera and photos',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 19,
        //         'partner_max_age' => 26,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'freelance camera man',
        //         'religion' => 6,
        //         'thumbnail' => '20240512112830_66408bbedc1d7_thumb_yosuke5.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 6,
        //         'username' => 'Mg Mg',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'mgmg@gmail.com',
        //         'phone' => '0997679895',
        //         'email_confirm_code' => '9f1d37c74f1c26dafc068e3a0f5b8f43',
        //         'gender' => 0,
        //         'date_of_birth' => '2000-09-05',
        //         'education' => 'bachelor',
        //         'city_id' => 6,
        //         'height_feet' => 5,
        //         'height_inches' => 7,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love coding',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 28,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'junior web developer',
        //         'religion' => 7,
        //         'thumbnail' => '20240512113218_66408ca2e7e3b_thumb_ryusei.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 7,
        //         'username' => 'Aung Aung',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'aungaung@gmail.com',
        //         'phone' => '093588657',
        //         'email_confirm_code' => 'b1490f90375d5e31a875b4c581f132a5',
        //         'gender' => 0,
        //         'date_of_birth' => '1999-02-23',
        //         'education' => 'bachelor',
        //         'city_id' => 7,
        //         'height_feet' => 5,
        //         'height_inches' => 9,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love fashion',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 28,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'model',
        //         'religion' => 5,
        //         'thumbnail' => '220240512113935_66408e577f77f_thumb_yuki.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 8,
        //         'username' => 'Zaw Zaw',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'zawzaw@gmail.com',
        //         'phone' => '09865678',
        //         'email_confirm_code' => '7c401c852c03a4d44e5b18122f12972e',
        //         'gender' => 0,
        //         'date_of_birth' => '2001-01-22',
        //         'education' => 'bachelor',
        //         'city_id' => 8,
        //         'height_feet' => 5,
        //         'height_inches' => 7,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love vlogging',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 27,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'Youtuber',
        //         'religion' => 3,
        //         'thumbnail' => '20240512114255_66408f1f1b04e_thumb_harry.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 9,
        //         'username' => 'Yin Yin',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'yinyin@gmail.com',
        //         'phone' => '09865467',
        //         'email_confirm_code' => 'd6dfda1751ea0b18b61a47d2db8abfe6',
        //         'gender' => 1,
        //         'date_of_birth' => '1998-11-17',
        //         'education' => 'associate degree',
        //         'city_id' => 9,
        //         'height_feet' => 5,
        //         'height_inches' => 2,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love tea and coffee',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 29,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'barista',
        //         'religion' => 4,
        //         'thumbnail' => '20240512114605_66408fddda655_thumb_emma3.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 10,
        //         'username' => 'Phue Phue',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'phuephue@gmail.com',
        //         'phone' => '098975567',
        //         'email_confirm_code' => 'e7e0ea1c905e643cf77a8e3b572e9c04',
        //         'gender' => 1,
        //         'date_of_birth' => '1999-02-01',
        //         'education' => 'business diploma',
        //         'city_id' => 10,
        //         'height_feet' => 5,
        //         'height_inches' => 10,
        //         'status' => 5,
        //         // 'love_status' =>
        //         'about' => 'independent woman',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 21,
        //         'partner_max_age' => 27,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'Accountant',
        //         'religion' => 5,
        //         'thumbnail' => '20240529071204_6656b9245d924_thumb_anya.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 11,
        //         'username' => 'Thawtar',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'thawtar@gmail.com',
        //         'phone' => '098657893',
        //         'email_confirm_code' => '697c5af007fd22a1a825391c9d0479f8',
        //         'gender' => 1,
        //         'date_of_birth' => '1997-02-05',
        //         'education' => 'bachelor',
        //         'city_id' => 11,
        //         'height_feet' => 5,
        //         'height_inches' => 5,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love singing',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 24,
        //         'partner_max_age' => 32,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'singer',
        //         'religion' => 5,
        //         'thumbnail' => '20240512115632_6640925047d69_thumb_taylor1.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 12,
        //         'username' => 'Kaung Htet',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'kaunghtet@gmail.com',
        //         'phone' => '098667899',
        //         'email_confirm_code' => 'f57982c5c4b6b137277f4cc6233ccb9c',
        //         'gender' => 0,
        //         'date_of_birth' => '1995-04-12',
        //         'education' => 'bachelor',
        //         'city_id' => 12,
        //         'height_feet' => 6,
        //         'height_inches' => 2,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love singing',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 25,
        //         'partner_max_age' => 30,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'singer',
        //         'religion' => 1,
        //         'thumbnail' => '20240512133025_6640a851c28ce_thumb_harrys.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 13,
        //         'username' => 'Hein Htet',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'heinhtet@gmail.com',
        //         'phone' => '098665789',
        //         'email_confirm_code' => '0762d78728aacd83a31889679308c3d',
        //         'gender' => 0,
        //         'date_of_birth' => '1994-12-21',
        //         'education' => 'associate degree',
        //         'city_id' => 13,
        //         'height_feet' => 6,
        //         'height_inches' => 0,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love music',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 24,
        //         'partner_max_age' => 29,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'music producer',
        //         'religion' => 4,
        //         'thumbnail' => '20240512133351_6640a91fefbe8_thumb_liam.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 14,
        //         'username' => 'Min Thant',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'minthant@gmail.com',
        //         'phone' => '098755789',
        //         'email_confirm_code' => 'ddf2383a5a428d70b1587f69f48a6b82',
        //         'gender' => 0,
        //         'date_of_birth' => '1997-02-04',
        //         'education' => 'high school diploma',
        //         'city_id' => 14,
        //         'height_feet' => 5,
        //         'height_inches' => 10,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love football',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 24,
        //         'partner_max_age' => 32,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'professional football player',
        //         'religion' => 4,
        //         'thumbnail' => '20240512134006_6640aa9637084_thumb_neymar.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 15,
        //         'username' => 'Hein Ko',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'heinko@gmail.com',
        //         'phone' => '093546893',
        //         'email_confirm_code' => 'f3b5ff1f98b73f7bfe7a7f879e7495c0',
        //         'gender' => 0,
        //         'date_of_birth' => '1996-03-31',
        //         'education' => 'associate degree',
        //         'city_id' => 1,
        //         'height_feet' => 6,
        //         'height_inches' => 1,
        //         'status' => 2,
        //         // 'love_status' =>
        //         'about' => 'love art',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 26,
        //         'partner_max_age' => 30,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'tattoo artist',
        //         'religion' => 5,
        //         'thumbnail' => '20240512134332_6640ab6463721_thumb_zyan.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 16,
        //         'username' => 'Zay Yar',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'zayyar@gmail.com',
        //         'phone' => '094678993',
        //         'email_confirm_code' => '25c2706e08d3e236bdcc12a6022cf464',
        //         'gender' => 0,
        //         'date_of_birth' => '1997-09-17',
        //         'education' => 'bachelor',
        //         'city_id' => 2,
        //         'height_feet' => 6,
        //         'height_inches' => 3,
        //         'status' => 2,
        //         // 'love_status' =>
        //         'about' => 'love vlogging',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 23,
        //         'partner_max_age' => 28,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'Youtuber',
        //         'religion' => 1,
        //         'thumbnail' => '20240512134715_6640ac43d6acd_thumb_logan.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 17,
        //         'username' => 'Lawun',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'lawun@gmail.com',
        //         'phone' => '093468094',
        //         'email_confirm_code' => 'a0493b5084b14ea1414067649e25a688',
        //         'gender' => 1,
        //         'date_of_birth' => '2000-08-08',
        //         'education' => 'bachelor',
        //         'city_id' => 3,
        //         'height_feet' => 5,
        //         'height_inches' => 5,
        //         'status' => 2,
        //         // 'love_status' =>
        //         'about' => 'love tea and puppies',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 27,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'hair dresser',
        //         'religion' => 1,
        //         'thumbnail' => '20240512135235_6640ad8368773_thumb_chaeyong5.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 18,
        //         'username' => 'Shoon Lae',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'shoonlae@gmail.com',
        //         'phone' => '0946890935',
        //         'email_confirm_code' => 'c3be6275ea99096b9e9109cf51e7b1d3',
        //         'gender' => 1,
        //         'date_of_birth' => '1996-03-04',
        //         'education' => 'MBBS',
        //         'city_id' => 4,
        //         'height_feet' => 5,
        //         'height_inches' => 8,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'just a girl who loves rain',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 27,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'hair dresser',
        //         'religion' => 1,
        //         'thumbnail' => '20240512135235_6640ad8368773_thumb_chaeyong5.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 19,
        //         'username' => 'Myo Zaw',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'myozaw@gmail.com',
        //         'phone' => '093895566',
        //         'email_confirm_code' => 'f497e5ba3f2c914218b53146d69c3d6a',
        //         'gender' => 0,
        //         'date_of_birth' => '1994-05-24',
        //         'education' => 'master',
        //         'city_id' => 5,
        //         'height_feet' => 5,
        //         'height_inches' => 7,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love chess',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 25,
        //         'partner_max_age' => 35,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'chess grandmaster',
        //         'religion' => 5,
        //         'thumbnail' => '20240512145957_6640bd4d18f96_thumb_brad3.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 20,
        //         'username' => 'Zaw Min',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'zawmin@gmail.com',
        //         'phone' => '0946793565',
        //         'email_confirm_code' => '8a5217cdce75f1d876261c4dbdb8c779',
        //         'gender' => 0,
        //         'date_of_birth' => '2000-10-23',
        //         'education' => 'bachelor',
        //         'city_id' => 6,
        //         'height_feet' => 6,
        //         'height_inches' => 0,
        //         'status' => 0,
        //         // 'love_status' =>
        //         'about' => 'love solving quizzes',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 35,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'mid-level developer',
        //         'religion' => 1,
        //         'thumbnail' => '20240512150428_6640be5c9aaec_thumb_tom3.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 21,
        //         'username' => 'Min Thet',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'minthet@gmail.com',
        //         'phone' => '0923568967',
        //         'email_confirm_code' => 'dcd24702c9252facf8052e88e3e6619f',
        //         'gender' => 0,
        //         'date_of_birth' => '1990-03-21',
        //         'education' => 'bachelor',
        //         'city_id' => 7,
        //         'height_feet' => 5,
        //         'height_inches' => 10,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love teaching kids',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 27,
        //         'partner_max_age' => 35,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'maths teacher',
        //         'religion' => 7,
        //         'thumbnail' => '20240512150745_6640bf21cd6f0_thumb_tomh.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 22,
        //         'username' => 'Shwe Yi',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'shweyi@gmail.com',
        //         'phone' => '0956789032',
        //         'email_confirm_code' => '3f7f7145fa7c589189db0bf090cd1556',
        //         'gender' => 1,
        //         'date_of_birth' => '2000-05-02',
        //         'education' => 'diploma',
        //         'city_id' => 8,
        //         'height_feet' => 5,
        //         'height_inches' => 3,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'a percent better everyday',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 21,
        //         'partner_max_age' => 27,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'chef',
        //         'religion' => 4,
        //         'thumbnail' => '20240512151129_6640c00151d44_thumb_anne4.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 23,
        //         'username' => 'May Myo',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'maymyo@gmail.com',
        //         'phone' => '093568997',
        //         'email_confirm_code' => '0d569f18374c603bcd2e18577a910c89',
        //         'gender' => 1,
        //         'date_of_birth' => '2002-11-12',
        //         'education' => 'diploma',
        //         'city_id' => 9,
        //         'height_feet' => 5,
        //         'height_inches' => 7,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love doodles',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 19,
        //         'partner_max_age' => 23,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'ui/ux designer',
        //         'religion' => 3,
        //         'thumbnail' => '20240512151621_6640c1255522b_thumb_mei2.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 24,
        //         'username' => 'Zu Zu',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'zuzu@gmail.com',
        //         'phone' => '098778384',
        //         'email_confirm_code' => 'a376a8cf39efdbca06b1b2d15a3fd121',
        //         'gender' => 1,
        //         'date_of_birth' => '2002-02-19',
        //         'education' => 'college',
        //         'city_id' => 10,
        //         'height_feet' => 5,
        //         'height_inches' => 2,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'wishing a soulmate',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 20,
        //         'partner_max_age' => 23,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 1,
        //         'thumbnail' => '20240512152132_6640c25c9841f_thumb_saito2.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 25,
        //         'username' => 'Khat Zaw',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'khantzaw@gmail.com',
        //         'phone' => '0946789943',
        //         'email_confirm_code' => '30bcd1ddc6f14b0d9fa7d1d858dae9dd',
        //         'gender' => 0,
        //         'date_of_birth' => '1995-04-27',
        //         'education' => 'bachelor',
        //         'city_id' => 11,
        //         'height_feet' => 5,
        //         'height_inches' => 10,
        //         'status' => 0,
        //         // 'love_status' =>
        //         'about' => 'my life, my choice',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 23,
        //         'partner_max_age' => 28,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 3,
        //         'thumbnail' => '20240512152534_6640c34eddb17_thumb_goki2.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 26,
        //         'username' => 'Thuta Aung',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'thutaaung@gmail.com',
        //         'phone' => '0988478924',
        //         'email_confirm_code' => '2a29f794fb321f992a02f45d2c9a3057',
        //         'gender' => 0,
        //         'date_of_birth' => '2002-09-30',
        //         'education' => 'college',
        //         'city_id' => 12,
        //         'height_feet' => 5,
        //         'height_inches' => 6,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'hoping a better life',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 19,
        //         'partner_max_age' => 24,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 3,
        //         'thumbnail' => '20240512152926_6640c43651bf3_thumb_mori2.png',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 27,
        //         'username' => 'Chaw Kalayar',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'chawkalayar@gmail.com',
        //         'phone' => '0957899436',
        //         'email_confirm_code' => 'bd68a89252b6c25132843fdbe8e4659e',
        //         'gender' => 1,
        //         'date_of_birth' => '1999-11-20',
        //         'education' => 'bachelor',
        //         'city_id' => 13,
        //         'height_feet' => 5,
        //         'height_inches' => 4,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love puppies',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 20,
        //         'partner_max_age' => 25,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'japanese teacher',
        //         'religion' => 6,
        //         'thumbnail' => '20240512153307_6640c51339d22_thumb_mone.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 28,
        //         'username' => 'Wint war',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'wintwar@gmail.com',
        //         'phone' => '09546790923',
        //         'email_confirm_code' => '25bbabc0fafebf010458a3611b23c940',
        //         'gender' => 1,
        //         'date_of_birth' => '2000-07-12',
        //         'education' => 'bachelor',
        //         'city_id' => 14,
        //         'height_feet' => 5,
        //         'height_inches' => 4,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love clothing',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 23,
        //         'partner_max_age' => 27,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'designer',
        //         'religion' => 1,
        //         'thumbnail' => '20240512153639_6640c5e7cbb29_thumb_usagi.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 29,
        //         'username' => 'Kyaw Zin',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'kyawzin@gmail.com',
        //         'phone' => '0956890034',
        //         'email_confirm_code' => '5e61f086a4add530ac25b58a1c54d58c',
        //         'gender' => 0,
        //         'date_of_birth' => '1998-07-28',
        //         'education' => 'associate degree',
        //         'city_id' => 1,
        //         'height_feet' => 5,
        //         'height_inches' => 9,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love blue sky',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 25,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'actor',
        //         'religion' => 4,
        //         'thumbnail' => '20240512154116_6640c6fc92415_thumb_dori1.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 30,
        //         'username' => 'Kabyar Hnin',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'kabyarhnin@gmail.com',
        //         'phone' => '0946898654',
        //         'email_confirm_code' => 'f6646a02a09de32ce16498379323779d',
        //         'gender' => 1,
        //         'date_of_birth' => '1997-08-17',
        //         'education' => 'bachelor',
        //         'city_id' => 2,
        //         'height_feet' => 5,
        //         'height_inches' => 8,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love vlogging',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 28,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'social influencer',
        //         'religion' => 3,
        //         'thumbnail' => '20240512154644_6640c844c24a2_thumb_miyoshi.png',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 31,
        //         'username' => 'Shin Yupar',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'shinyupar@gmail.com',
        //         'phone' => '09578974354',
        //         'email_confirm_code' => 'a60d0431ba445cb786a46e4b3402b29f',
        //         'gender' => 1,
        //         'date_of_birth' => '2000-08-16',
        //         'education' => 'diploma',
        //         'city_id' => 3,
        //         'height_feet' => 5,
        //         'height_inches' => 4,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'business woman',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 27,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'online shop owner',
        //         'religion' => 2,
        //         'thumbnail' => '20240512155853_6640cb1d31c12_thumb_aya.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 32,
        //         'username' => 'Kyaw Zay Yar',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'kyawzayyar@gmail.com',
        //         'phone' => '09884964243',
        //         'email_confirm_code' => 'ef242b897107991567fa54fe2de81034',
        //         'gender' => 0,
        //         'date_of_birth' => '1997-09-02',
        //         'education' => 'bachelor',
        //         'city_id' => 4,
        //         'height_feet' => 5,
        //         'height_inches' => 5,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love the world and trees',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 21,
        //         'partner_max_age' => 25,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'content writer',
        //         'religion' => 6,
        //         'thumbnail' => '20240512160221_6640cbed8da3a_thumb_kento.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 33,
        //         'username' => 'Yi Mon',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'yimon@gmail.com',
        //         'phone' => '094468894',
        //         'email_confirm_code' => '33bd41710e28b492b27add36887da5bf',
        //         'gender' => 1,
        //         'date_of_birth' => '2004-04-21',
        //         'education' => 'college',
        //         'city_id' => 5,
        //         'height_feet' => 5,
        //         'height_inches' => 2,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'trying to be a better person',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 19,
        //         'partner_max_age' => 24,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 3,
        //         'thumbnail' => '20240512160700_6640cd04c90db_thumb_yuri1.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 34,
        //         'username' => 'Yadanar Phyo',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'yadanarphyo@gmail.com',
        //         'phone' => '0987789993',
        //         'email_confirm_code' => '1fbb091e062a74360257627b07d5cacc',
        //         'gender' => 1,
        //         'date_of_birth' => '1996-05-10',
        //         'education' => 'bachelor',
        //         'city_id' => 6,
        //         'height_feet' => 5,
        //         'height_inches' => 4,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love cultures',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 24,
        //         'partner_max_age' => 30,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'bar manager',
        //         'religion' => 4,
        //         'thumbnail' => '20240512161041_6640cde1425df_thumb_risa1.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 35,
        //         'username' => 'Kaung Lin',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'kaunglin@gmail.com',
        //         'phone' => '0956899552',
        //         'email_confirm_code' => '388c6aa87b11462efebf40c51ed16ec7',
        //         'gender' => 0,
        //         'date_of_birth' => '1997-07-26',
        //         'education' => 'bachelor',
        //         'city_id' => 7,
        //         'height_feet' => 5,
        //         'height_inches' => 7,
        //         'status' => 0,
        //         // 'love_status' =>
        //         'about' => 'love apps',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 26,
        //         'partner_max_age' => 30,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'senior web developer',
        //         'religion' => 3,
        //         'thumbnail' => '20240512161553_6640cf19c3fd9_thumb_park3.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 36,
        //         'username' => 'Yu Ya',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'yuya@gmail.com',
        //         'phone' => '0957893545',
        //         'email_confirm_code' => 'c0eee6b64cedc92c9be5c870292130e6',
        //         'gender' => 1,
        //         'date_of_birth' => '1999-04-26',
        //         'education' => 'bachelor',
        //         'city_id' => 8,
        //         'height_feet' => 5,
        //         'height_inches' => 4,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'doing fine',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 25,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'sales manager',
        //         'religion' => 1,
        //         'thumbnail' => '20240512161955_6640d00be2f00_thumb_iu.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 37,
        //         'username' => 'Aye Thandar',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'ayethandar@gmail.com',
        //         'phone' => '09567899896',
        //         'email_confirm_code' => '1b7e9d4659bffff6d65d70f7fd3e2239',
        //         'gender' => 1,
        //         'date_of_birth' => '2004-08-18',
        //         'education' => 'college',
        //         'city_id' => 9,
        //         'height_feet' => 5,
        //         'height_inches' => 4,
        //         'status' => 1,
        //         // 'love_status' =>
        //         'about' => 'love music',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 20,
        //         'partner_max_age' => 24,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 6,
        //         'thumbnail' => '20240512162253_6640d0bd20190_thumb_kim1.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 38,
        //         'username' => 'Theint Kyi Phyu',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'theintkyiphyu@gmail.com',
        //         'phone' => '0986567989',
        //         'email_confirm_code' => '307bf9d413c565967ee9ef5f2c797be2',
        //         'gender' => 1,
        //         'date_of_birth' => '2001-07-18',
        //         'education' => 'bachelor',
        //         'city_id' => 10,
        //         'height_feet' => 5,
        //         'height_inches' => 6,
        //         'status' => 4,
        //         // 'love_status' =>
        //         'about' => 'love food',
        //         'partner_gender' => 0,
        //         'partner_min_age' => 21,
        //         'partner_max_age' => 26,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'food vlogger',
        //         'religion' => 3,
        //         'thumbnail' => '20240512162511_6640d147d037b_thumb_yoona.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 39,
        //         'username' => 'Aung Khant',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'aungkhant@gmail.com',
        //         'phone' => '0987668989',
        //         'email_confirm_code' => '3b88f81d3ed938f2f537110ddca4e388',
        //         'gender' => 0,
        //         'date_of_birth' => '2005-05-09',
        //         'education' => 'college',
        //         'city_id' => 11,
        //         'height_feet' => 5,
        //         'height_inches' => 8,
        //         'status' => 4,
        //         // 'love_status' =>
        //         'about' => 'love nature and the world',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 18,
        //         'partner_max_age' => 20,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'student',
        //         'religion' => 1,
        //         'thumbnail' => '20240512162851_6640d22379472_thumb_choi1.jpg',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );

        // DB::table('members')->insert(
        //     [
        //         'id' => 40,
        //         'username' => 'Kaung Sett',
        //         'password' => bcrypt('aaa'),
        //         'email' => 'kaungsett@gmail.com',
        //         'phone' => '0977998975',
        //         'email_confirm_code' => 'e76803b017388e1b8230e1e5232475b2',
        //         'gender' => 0,
        //         'date_of_birth' => '2001-11-20',
        //         'education' => 'bachelor',
        //         'city_id' => 12,
        //         'height_feet' => 5,
        //         'height_inches' => 7,
        //         'status' => 2,
        //         // 'love_status' =>
        //         'about' => 'love coding',
        //         'partner_gender' => 1,
        //         'partner_min_age' => 22,
        //         'partner_max_age' => 25,
        //         'last_login' => date('Y-m-d H:i:s'),
        //         'point' => 1000,
        //         'work' => 'software engineer',
        //         'religion' => 3,
        //         'thumbnail' => '20240512163410_6640d362c6373_thumb_parkb.webp',
        //         'verify_photo' => null,
        //         'view_count' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'updated_by' => 1
        //     ]
        // );
    }
}
