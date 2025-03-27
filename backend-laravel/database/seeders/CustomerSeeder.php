<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = new Customer();
        $customer->first_name = ' ';
        $customer->last_name = ' ';
        $customer->save();

        $customer = new Customer();
        $customer->first_name = 'Valerie';
        $customer->last_name = 'alvarez';
        $customer->save();

        $customer = new Customer();
        $customer->first_name = 'Jane';
        $customer->last_name = 'palmer';
        $customer->save();
    }
}
