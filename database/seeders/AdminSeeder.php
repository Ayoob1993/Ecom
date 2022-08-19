<?php

namespace Database\Seeders;

use App\Models\Admin;
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

        $adminRecords = [
            [
                'id'=>1,
                'name'=>'Super Admin',
                'type'=>'superadmin',
                'vendor_id'=>0,
                'mobile'=>'0777076914',
                'email'=>'admin@gmail.com',
                'password'=>'$2a$12$v0afSPwzim4u627bVCmgOO.vMlXL8u9xArZG9JMRPir..pXb526uq',
                'image'=>'',
                'status'=>1
            ],
        ];

        Admin::insert($adminRecords);

    }
}
