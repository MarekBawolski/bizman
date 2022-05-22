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
        $client = Client::all()->random();
        $user = User::all()->random();
        $items = PricedItem::all()->where('user_id', $user->id)->random($this->faker->numberBetween(3, 12))->pluck('id');
        $status = QuoteState::all()->where('user_id', $user->id)->random();

        return [
            'client_id' => $client->id,
            'user_id' => $user->id,
            'status_id' => $status->id,
            'name' => $this->faker->catchPhrase(),
            'quote_elements' => json_encode($items->toArray()),
        ];
    }
}
