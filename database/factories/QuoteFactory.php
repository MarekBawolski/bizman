<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\PricedItem;
use App\Models\QuoteState;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $user = User::all()->random();
        $client = Client::all()->where('user_id', $user->id)->random();
        $state = QuoteState::all()->where('user_id', $user->id)->random();
        return [
            'client_id' => $client->id,
            'user_id' => $user->id,
            'state_id' => $state->id,
            'name' => $this->faker->realText(20),
        ];
    }
}
