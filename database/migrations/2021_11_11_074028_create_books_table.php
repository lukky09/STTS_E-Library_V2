<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id("book_id")->autoIncrement();
            $table->string('book_name')->unique();
            $table->integer("shop_qty");
            $table->integer("shop_price");
            $table->string('book_synopsis');
            $table->integer("genre_id");
            $table->integer("publisher_id");
            $table->integer("author_id");
            $table->string('book_dir');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
