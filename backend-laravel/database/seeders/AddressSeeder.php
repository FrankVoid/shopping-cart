<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;


class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = new Address();
        $address->line_1 = '3645 LA-18';
        $address->line_2 = '';
        $address->city = 'Vacherie';
        $address->state = 'Louisiana';
        $address->zip = '70090';
        $address->customer_id = 1;
        $address->status = 'active';
        $address->save();

        $address = new Address();
        $address->line_1 = '203 W Main St';
        $address->line_2 = '';
        $address->city = 'Sargent';
        $address->state = 'Nebraska';
        $address->zip = '68874';
        $address->customer_id = 1;
        $address->status = 'active';
        $address->save();

        $address = new Address();
        $address->line_1 = '28850 Cabot Dr';
        $address->line_2 = '#1300';
        $address->city = ' Novi';
        $address->state = 'Michigan';
        $address->zip = '48377';
        $address->customer_id = 2;
        $address->status = 'active';
        $address->save();

        $address = new Address();
        $address->line_1 = '50 North Temple';
        $address->line_2 = '';
        $address->city = 'Salt Lake City';
        $address->state = 'Utah';
        $address->zip = '84150';
        $address->customer_id = 2;
        $address->status = 'active';
        $address->save();

    }
}
