<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();
        /*\App\Models\Order::factory(30)->create();
        \App\Models\Giftcard::factory(15)->create();
        \App\Models\Product::factory(9)->create();
        \App\Models\Item::factory(50)->create();
        \App\Models\Payment::factory(50)->create();*/
    }
}
