<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('product_id')->unique();
            $table->string('product_name')->unique();
            $table->text('description');
            $table->decimal('product_price', 10, 2);
            $table->uuid('category_uuid')
                ->index('category_uuid')
                ->foreign('category_uuid')
                ->references('uuid')
                ->on('categories')
                ->onDelete('cascade')
                ->nullable();
            $table->binary('image');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
