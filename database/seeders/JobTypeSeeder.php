<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $abbreviation = $this->faker->randomElement(['UI', 'UX', 'PM', 'DEV', 'GFX']);
        $types = [
            'UI' => 'User Interface',
            'UX' => 'User Experience',
            'PM' => 'Project Management ',
            'DEV' => 'Development',
            'GFX' => 'Graphic Design',
        ];

        $users = User::all();

        foreach ($users as $user) {

            foreach ($types as $abrv => $type) {
                DB::table('job_types')->insert([
                    'user_id' => $user->id,
                    'type' => $type,
                    'abbreviation' => $abrv,
                ]);
            }
        }
        // JobType::factory()
        //     ->count(20)
        //     ->create();
    }
}
