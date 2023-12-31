<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('description');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('qty');
            $table->string('image')->nullable();
            $table->string('meta_title');
            $table->mediumText('meta_description')->nullable();
            $table->mediumtext('meta_keyword')->nullable();
            $table->tinyInteger('status')->default('0');
           
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
        Schema::dropIfExists('posts');
    }
};
