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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->nullable()->unique();
            $table->string('name');
            $table->string('lname');
            $table->string('Nname')->nullable();
            //$table->string('photo')->nullable();
            $table->string('sex')->nullable();
            $table->string('status')->nullable();
            $table->string('tel')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_admin')->nullable();
            $table->string('password');
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
};
