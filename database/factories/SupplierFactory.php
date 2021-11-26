<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName();
        $add = $this->faker->companySuffix();

        return [
            "supplier_name" => "$name $add",
            "supplier_pass" => password_hash('456', PASSWORD_DEFAULT),
            "supplier_saldo" => rand(10,25) * 1000
        ];
    }
}
