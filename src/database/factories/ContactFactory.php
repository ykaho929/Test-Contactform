<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->FirstName,
            'last_name' => $this->faker->LastName,
            'gender' => $this->faker->randomElement(['1', '2', '3']),
            'email' => $this->faker->safeEmail,
            'tell' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'building' => $this->faker->secondaryAddress,
            'category_id' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'detail' => $this->faker->realText(120),
        ];
    }
}
