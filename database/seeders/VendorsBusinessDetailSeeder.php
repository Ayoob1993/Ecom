<?php

namespace Database\Seeders;

use App\Models\VendorsBusinessDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessDetailSeeder extends Seeder
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
            'vendor_id'=>1,
            'shop_name'=>'Zawahir Electronics',
            'Shop_address'=>'Akurana',
            'shop_city'=>'Kandy',
            'shop_state'=>'Central',
            'shop_country'=>'Sri Lanka',
            'shop_pincode'=>'20850',
            'shop_mobile'=>'0771241006',
            'shop_website'=>'zawahirelectronics.com',
            'shop_email'=>'zawahir@gmail.com',
            'address_proof'=>'NIC',
            'address_proof_image'=>'test.jpg',
            'business_license_number'=>'125455555',
            'pan_number'=>'44554555555',
        ];
        VendorsBusinessDetail::insert($vendorRecords);
    }
}
