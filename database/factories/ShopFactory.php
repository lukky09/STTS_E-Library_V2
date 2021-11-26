<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            "shop_email" => $name."@toko.com",
            "shop_name" => $name."'s Shop",
            "shop_saldo" => rand(10,100) * 1000,
            "shop_pass" => password_hash('789', PASSWORD_DEFAULT),
            "shop_phone" => $this->faker->phoneNumber()
        ];
    }
}
