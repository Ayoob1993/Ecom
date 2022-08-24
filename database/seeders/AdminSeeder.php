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
                    'id'=>2,
                    'name'=>'Zawahir',
                    'type'=>'vendor',
                    'vendor_id'=>1,
                    'mobile'=>'0771241006',
                    'email'=>'zawahir@gmail.com',
                    'password'=>'$2a$12$/jSR0Vug7PgHaVAhcte1luTx.hcAzu2.AXiBNiC9iZeSEYfXSxmlS',
                    'image'=>'',
                    'status'=>0,
                    'status'=>1,
                ]
        ];
        Admin::insert($adminRecords);

    }
}
