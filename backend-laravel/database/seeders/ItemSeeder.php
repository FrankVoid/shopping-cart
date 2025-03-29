<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new Item();
        $item->name = 'Sennheiser Consumer Audio HD 650 - Audiophile Hi-Res Open Back Dynamic Headphones';
        $item->quantity = 50;
        $item->price = 395.00;
        $item->save();

        $item = new Item();
        $item->name = 'Razer Viper V3 Pro Wireless Esports Gaming Mouse: Symmetrical, Faker Edition';
        $item->quantity = 10;
        $item->price = 179.99;
        $item->save();

        $item = new Item();
        $item->name = 'Xbox Core Controller - Carbon Black (Renewed)';
        $item->quantity = 5;
        $item->price = 52.39;
        $item->save();

        $item = new Item();
        $item->name = 'Valve Index VR';
        $item->quantity = 30;
        $item->price = 721.91;
        $item->save();

        $item = new Item();
        $item->name = 'Valve Index Controllers';
        $item->quantity = 30;
        $item->price = 425.00;
        $item->save();

        $item = new Item();
        $item->name = 'Valve Steam Deck OLED 1TB';
        $item->quantity = 500;
        $item->price = 739.99;
        $item->save();
    }
}
