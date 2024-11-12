<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
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
            'gender' => $this->faker->randomElement([1, 2, 3]),
            'email' => $this->faker->safeEmail,
            'tell' => $this->faker->phoneNumber,
            'address' => $this->faker->prefecture . ' ' . $this->faker->city . ' ' . $this->faker->streetAddress,
            'building' => $this->faker->secondaryAddress,
            'category_id' => Category::inRandomOrder()->value('id'),
            'detail' => $this->faker->realText(120),
        ];
    }
}
