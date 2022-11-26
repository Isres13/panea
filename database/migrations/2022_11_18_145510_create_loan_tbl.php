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
        Schema::create('loan_request', function (Blueprint $table) {
            $table->id();
            $table->integer('sarikatmati_id');//รหัสซารีกัตมาตี
            $table->string('employee_id');//รหัสคณะกรรมการ
            $table->integer('user_id');//รหัสสมาชิก
            $table->integer('account_id');//บัญชีเงินฝาก
            $table->date('requested_date');
            $table->string('objective');
            $table->decimal('amount',8,2);
            $table->integer('Approval');//คำอนุม้ติ
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
        Schema::dropIfExists('loan_request');
    }
};
