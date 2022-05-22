<?php

namespace Database\Factories;

use App\Models\QuoteState;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuoteStateFactory extends Factory
{
    protected $model = QuoteState::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random();
        return [
            'user_id' => $user->id,
            'settings_id' => $user->id,
            'state' => $this->faker->word()
        ];
    }
}
