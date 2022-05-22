<?php

namespace Database\Seeders;

use App\Models\PricedItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricedItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PricedItem::factory()
            ->count(150)
            ->create();
    }
}
