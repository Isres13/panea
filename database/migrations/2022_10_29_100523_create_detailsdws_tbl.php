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
        Schema::create('detailsdw', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id');//รหัสบัญชี
            $table->decimal('money',8,2);//จำนวนเงิน
            $table->integer('type');//ประเภท
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
        Schema::dropIfExists('detailsdw');
    }
};
