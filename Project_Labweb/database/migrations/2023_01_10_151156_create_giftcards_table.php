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
        Schema::create('giftcards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('code');
            $table->unsignedDecimal('value', 9, 2);
            $table->string('recipient')->nullable(true);
            $table->boolean('is_active');
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
        Schema::dropIfExists('giftcards');
    }
};
