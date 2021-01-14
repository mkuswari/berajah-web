<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail');
            $table->string('trailer_url');
            $table->text('description');
            $table->enum('level', ['All Level', 'Beginner', 'Intermediate', 'Expert']);
            $table->enum('type', ['Free', 'Premium']);
            $table->float('price')->nullable()->default(0);
            $table->string('prerequisite')->nullable();
            $table->enum('status', ['Published', 'Archived']);
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('instructor_id')->unsigned();
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("instructor_id")->references("id")->on("instructors");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
