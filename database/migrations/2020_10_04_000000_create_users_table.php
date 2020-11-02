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
            $table->foreignId('position_id')->default(1);//->constrained('users')->onDelete('cascade');
            $table->foreignId('section_id')->default(1);//->constrained('users')->onDelete('cascade');
            $table->foreignId('branch_id')->default(1);//->constrained('users')->onDelete('cascade');
            $table->string('fullname');
            $table->text('bio')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status'); // 1byte .. while it will take 1byte per char + 2bytes for the length information if its VARCHAR
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
