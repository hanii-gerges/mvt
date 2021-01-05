<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name_english')->nullable();
            $table->string('name_arabic');
            $table->date('birthdate');
            $table->string('nationality');
            $table->string('birth_place')->nullable();
            $table->string('residence_place')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('facebook_link')->nullable();
            $table->string('education_level')->nullable();
            $table->string('major')->nullable();
            $table->string('university')->nullable();
            $table->tinyInteger('academic_year')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('phd_major')->nullable();
            $table->text('experience')->nullable();
            $table->boolean('was_volunteer')->nullable();
            $table->text('past_voluntary')->nullable();
            $table->string('native_lang')->nullable();
            $table->string('other_lang')->nullable();
            $table->text('what_is_voluntary')->nullable();
            $table->text('why_us')->nullable();
            $table->text('any_ideas')->nullable();

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
        Schema::dropIfExists('applications');
    }
}
