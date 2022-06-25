<?php

namespace Database\Seeders;

use App\Models\QuoteState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class QuoteStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $states = ['Akceptacja', 'Wstrzymane', 'W trakcie', 'Zakończone', 'Oczekujące', 'Anulowane'];

        $colors = ['#56f000',     '#fce83a',     '#ffb302',   '#9ea7ad',    '#ff3838', '#9ea7ad'];
        foreach ($users as $user) {

            foreach ($states as $key => $name) {
                DB::table('quote_states')->insert([
                    'user_id' => $user->id,
                    'state' => $name,
                    'color' => $colors[$key]
                ]);
            }
        }

        // QuoteState::factory()
        //     ->count(20)
        //     ->create();
    }
}
