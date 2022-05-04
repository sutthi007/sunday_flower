<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\user;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Owner',
            'password' => Hash::make('123456789'),
            'role' => 'owner',
            'birthday' => '1999-01-19',
            'IDuser' => 'Test',
            'city' => 'เมือง',
            'subdistrict' => 'สันผีเสื้อ',
            'province' => 'เชียงใหม่',
            'address' => '406/11',
            'phone' => '0638032438',
            'zipcode' => '50000',
        ]);
    }
}
