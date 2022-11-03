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
        Schema::create('depositwithdraw', function (Blueprint $table) {
            $table->id();//รหัสบัญชี
            $table->integer('user_id');//รหัสผู้ใช้
            $table->decimal('balance',8,2)->default(0);//จำนวนเงินคงเหลือ
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
        Schema::dropIfExists('depositwithdraw');
    }
};
