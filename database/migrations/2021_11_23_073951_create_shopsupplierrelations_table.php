<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsupplierrelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopsupplierrelations', function (Blueprint $table) {
            $table->integer('shop_id');
            $table->integer('supplier_id');
            $table->integer('book_id');
            $table->integer('book_qty');
            $table->integer('book_subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopsupplierrelations');
    }
}
