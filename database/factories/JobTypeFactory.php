<?php

namespace Database\Factories;

use App\Models\JobType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jobTitle = $this->faker->jobTitle();
        $user = User::all()->random();
        return [
            'settings_id' => $user->id,
            'user_id' => $user->id,
            'type' => $jobTitle,
            'abbreviation' => substr($jobTitle, 0, 2)
        ];
    }
}
