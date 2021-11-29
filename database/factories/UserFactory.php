<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firstname = $this->faker->firstName();
        $lastname = $this->faker->lastName();

        return [
            'user_fname' => $firstname,
            'user_lname' => $lastname,
            'user_email' => strtolower($firstname).substr(strtolower($lastname),0,2)."@user.com",
            'user_pass' => Hash::make('123'),
            'user_saldo' => rand(1,100) * 1000
        ];
    }
}
