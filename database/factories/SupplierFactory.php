<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            "supplier_email" => substr(strtolower($name),0,3).substr(strtolower($add),0,3)."@supp.com",
            "supplier_pass" => Hash::make('456'),
            "supplier_saldo" => rand(10,25) * 1000
        ];
    }
}
