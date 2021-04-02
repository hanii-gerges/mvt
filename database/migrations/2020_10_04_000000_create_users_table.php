<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_id')->default(1);//->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('section_id')->default(1);//->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id')->default(1);//->constrained('users')->onDelete('cascade');
            $table->string('fullname');
            $table->text('bio')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(1); // 1byte .. while it will take 1byte per char + 2bytes for the length information if its VARCHAR
            $table->boolean('top_user')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
