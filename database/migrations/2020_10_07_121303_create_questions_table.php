<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('fullname');
            $table->tinyInteger('age');
            $table->string('phone');
            $table->string('email');
            $table->enum('reply_method',['whatsapp','facebook','email']);
            $table->string('social_link')->nullable();
            $table->string('title');
            $table->text('body');
            $table->boolean('status')->default(0);
            $table->boolean('sharable_name');
            $table->boolean('sharable_content');
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
        Schema::dropIfExists('questions');
    }
}
