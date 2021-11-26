<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            ['genre_name'=>'Literary Fiction'],
            ['genre_name'=>'Mystery'],
            ['genre_name'=>'Thriller'],
            ['genre_name'=>'Horror'],
            ['genre_name'=>'Historical'],
            ['genre_name'=>'Romance'],
            ['genre_name'=>'Western'],
            ['genre_name'=>'Science Fiction'],
            ['genre_name'=>'Fantasy'],
            ['genre_name'=>'Dystopian'],
        ]);
    }
}
