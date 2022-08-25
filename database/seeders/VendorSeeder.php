<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            'id'=>1,
            'name'=>'Zawahir',
            'address'=>'Akurana',
            'city'=>'Kandy',
            'state'=>'Central',
            'country'=>'Sri Lanka',
            'pincode'=>'20850',
            'mobile'=>'0771241006',
            'email'=>'zawahir@gmail.com',
            'status'=>0
        ];

        Vendor::insert($vendorRecords);

    }
}
