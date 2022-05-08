<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
/**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    //https://github.com/fzaninotto/Faker
        return [
            'first_name' => $this->faker->firstName,
            'last_name'=> $this->faker->lastName,
            'phone_number'=> $this->faker->e164PhoneNumber,
            'email'=> $this->faker->companyEmail,
            'address'=> $this->faker->streetAddress,
            'city'=> $this->faker->city,
            'company'=> $this->faker->company,
            'tax_id'=> $this->faker->regexify('[0-9]{10}'),
            'company_id'=> $this->faker->regexify('[0-9]{9}'),
            'website'=> $this->faker->domainName,
            'notes'=> $this->faker->realText(100)
        ];
    }
}
