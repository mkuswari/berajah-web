<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->string("slug");
            $table->string("thumbnail");
            $table->string("author");
            $table->text("content");
            $table->bigInteger("category_id")->unsigned()->nullable();
            $table->enum("status", ["Published", "Draft"])->default("Draft")->nullable();
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
