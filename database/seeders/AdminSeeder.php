<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@rahma.com',
               'phone'=>'0101010101',
               'photo'=>'111.jpg',
               'is_admin'=>'1',
               'password'=> bcrypt('12341234'),
            ],
            // [
            //    'name'=>'User',
            //    'email'=>'user@rahma.com',
            //     'is_admin'=>'0',
            //    'password'=> bcrypt('12341234'),
            // ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
