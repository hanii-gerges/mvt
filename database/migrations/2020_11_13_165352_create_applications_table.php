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
            $table->string('name_english');
            $table->string('name_arabic');
            $table->date('birthdate');
            $table->string('nationality');
            $table->string('birth_place');
            $table->string('residence_place');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('facebook_link');
            $table->string('education_level');
            $table->string('major');
            $table->string('university');
            $table->tinyInteger('academic_year');
            $table->date('graduation_date');
            $table->string('phd_major')->nullable();
            $table->text('experience');
            $table->boolean('was_volunteer');
            $table->text('past_voluntary')->nullable();
            $table->string('native_lang');
            $table->string('other_lang')->nullable();
            $table->text('what_is_voluntary');
            $table->text('why_us');
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
