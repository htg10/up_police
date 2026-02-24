<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $numberOfUsers = \DB::table('users')->count();
        // user
        if ($numberOfUsers == 0) {

            DB::table('users')->insert([
                [
                    'role_id' => 1,
                    'name' => 'UP Police',
                    'mobile' => 2222222222,
                    'email' => 'uppolice@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'password' => bcrypt('Uppolice@1234'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'role_id' => 2,
                    'name' => 'Admin User',
                    'mobile' => 3333333333,
                    'email' => 'admin@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'password' => bcrypt('Admin@1234'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                // [
                //     'role_id' => 3,
                //     'name' => 'Normal User',
                //     'mobile' => 4444444444,
                //     'email' => 'user@gmail.com',
                //     'email_verified_at' => Carbon::now(),
                //     'password' => bcrypt('User@1234'),
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],
            ]);

        }
    }
}
