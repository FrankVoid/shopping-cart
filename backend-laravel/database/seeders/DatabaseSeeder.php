<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(CustomerSeeder::class);
       $this->call(ItemSeeder::class);
       $this->call(AddressSeeder::class);
       $this->call(CartSeeder::class);
       $this->call(CartItemSeeder::class);


    }
}
