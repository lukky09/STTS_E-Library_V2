<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName();
        return [
            "shop_email" => strtolower($name)."@toko.com",
            "shop_name" => $name."'s Shop",
            "shop_saldo" => rand(10,100) * 1000,
            "shop_pass" => Hash::make('789'),
            "shop_phone" => $this->faker->phoneNumber()
        ];
    }
}
