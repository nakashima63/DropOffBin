<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_file_name',100)->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->date('time_limit');
            $table->unsignedBigInteger('user_id');
            $table->boolean('nego_status')->default(false);
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
