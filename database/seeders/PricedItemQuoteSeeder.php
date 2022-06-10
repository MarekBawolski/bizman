<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricedItemQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            foreach ($user->pricedItems as $item) {
                $item_id = $item->id;
                $quote_id = $user->quotes->random()->id;
                DB::table('priced_item_quote')->insert([
                    'quote_id' => $quote_id,
                    'priced_item_id' => $item_id,
                ]);
            }
        }
    }
}
