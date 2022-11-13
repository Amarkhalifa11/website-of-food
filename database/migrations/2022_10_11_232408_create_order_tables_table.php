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
        Schema::create('order_tables', function (Blueprint $table) {
            $table->id();
            $table->decimal('cost' , 8 ,2);
            $table->string('name');
            $table->string('email');
            $table->string('atatus');
            $table->string('city');
            $table->string('phone');
            $table->string('adress');
            $table->date('date');
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
        Schema::dropIfExists('order_tables');
    }
};
