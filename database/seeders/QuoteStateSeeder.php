<?php

namespace Database\Seeders;

use App\Models\QuoteState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuoteState::factory()
            ->count(20)
            ->create();
    }
}
