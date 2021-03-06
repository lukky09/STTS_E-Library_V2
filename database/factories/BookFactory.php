<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_name' => Str::title($this->faker->words(4, true)),
            'shop_qty' => rand(0,20),
            'shop_price' => rand(10,150) * 1000,
            'genre_id' => $this->faker->randomElement(Genre::all()->pluck('genre_id')),
            'publisher_id' => $this->faker->randomElement(Publisher::all()->pluck('publisher_id')),
            'author_id' => $this->faker->randomElement(Author::all()->pluck('author_id')),
            'book_synopsis' => $this->faker->sentence(10, true),
            'book_dir'=> "Test"
        ];
    }
}
