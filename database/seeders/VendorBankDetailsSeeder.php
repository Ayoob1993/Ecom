<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorBankDetailsSeeder extends Seeder
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
            'account_holder_name'=>'Noor Mohamad Zawahir',
            'bank_name'=>'Amana',
            'account_number'=>'Akurana',
            'bank_ifsc_code'=>'54545444'
        ];
    VendorsBankDetails::insert($vendorRecords);
    }
}
