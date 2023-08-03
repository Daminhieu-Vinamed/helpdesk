<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'employee_code' => '110027',
                'first_name' => "Đàm",
                'last_name' => "Hiếu",
                'full_name' => "Đàm Minh Hiếu",
                'apartment_number' => 31,
                'village' => "Phúc Trại",
                'wards' => "Tân Minh",
                'district' => "Thường Tín",
                'city' => "Hà Nội",
                'phone' => "0342770723",
                'role' => 1,
                'status' => 1,
                'email' => "daminhieu173@gmail.com",
                'password' => bcrypt('Daminhieu1703@'),
            ],
            [
                'employee_code' => '110027',
                'first_name' => "Đàm",
                'last_name' => "Hiếu",
                'full_name' => "Đàm Minh Hiếu",
                'apartment_number' => 31,
                'village' => "Phúc Trại",
                'wards' => "Tân Minh",
                'district' => "Thường Tín",
                'city' => "Hà Nội",
                'phone' => "0342770723",
                'role' => 2,
                'status' => 2,
                'email' => "daminhieu173@gmail.com",
                'password' => bcrypt('Daminhieu1703@'),
            ],
            [
                'employee_code' => '110027',
                'first_name' => "Đàm",
                'last_name' => "Hiếu",
                'full_name' => "Đàm Minh Hiếu",
                'apartment_number' => 31,
                'village' => "Phúc Trại",
                'wards' => "Tân Minh",
                'district' => "Thường Tín",
                'city' => "Hà Nội",
                'phone' => "0342770723",
                'role' => 3,
                'status' => 2,
                'email' => "daminhieu173@gmail.com",
                'password' => bcrypt('Daminhieu1703@'),
            ],
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
