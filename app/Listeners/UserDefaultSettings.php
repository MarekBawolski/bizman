<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UserDefaultSettings
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {

        $states = ['Akceptacja', 'Wstrzymane', 'W trakcie', 'Zakończone', 'Oczekujące', 'Anulowane'];

        $colors = ['#56f000',     '#fce83a',     '#ffb302',   '#9ea7ad',    '#ff3838', '#9ea7ad'];

        foreach ($states as $key => $name) {
            DB::table('quote_states')->insert([
                'user_id' => $event->user->id,
                'state' => $name,
                'color' => $colors[$key]
            ]);
        }


        $types = [
            'UI' => 'User Interface',
            'UX' => 'User Experience',
            'PM' => 'Project Management ',
            'DEV' => 'Development',
            'GFX' => 'Graphic Design',
        ];

        foreach ($types as $abrv => $type) {
            DB::table('job_types')->insert([
                'user_id' => $event->user->id,
                'type' => $type,
                'abbreviation' => $abrv,
            ]);
        }
    }
}
