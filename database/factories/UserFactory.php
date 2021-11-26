<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_email' => $firstname."@user.com",
            'user_pass' => password_hash('123', PASSWORD_DEFAULT),
            'user_saldo' => rand(1,100) * 1000
        ];
    }
}
