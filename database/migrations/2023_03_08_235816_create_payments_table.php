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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('payment_uuid')->nullable()->unique();
            $table->foreignUuid('user_uuid')->refrence('user_uuid')->on('users');
            $table->foreignId('iptv_plans_id')->references('id')->on('iptv_plans');
            $table->string('mac_address')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('amount')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('status')->nullable();
            $table->string('receipt')->nullable();
            $table->integer('risk_score')->nullable();
            $table->string('risk_level')->nullable();
            $table->string('card_id')->nullable();
            $table->string('country')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('last4')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
