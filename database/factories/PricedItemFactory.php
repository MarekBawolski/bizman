<?php

namespace Database\Factories;

use App\Models\JobType;
use App\Models\PricedItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PricedItemFactory extends Factory
{
    protected $model = PricedItem::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userId = $this->faker->numberBetween(1, User::all()->count());
        $jobType = JobType::all()->where('user_id', $userId)->random();
        return [
            'user_id' => $userId,
            'title' => $this->faker->sentence($this->faker->numberBetween(3, 5)),
            'content' => $this->faker->sentence($this->faker->numberBetween(10, 40)),
            'work_hours' => $this->faker->numberBetween(1, 12),
            'job_type_id' => $jobType->id
        ];
    }
}
