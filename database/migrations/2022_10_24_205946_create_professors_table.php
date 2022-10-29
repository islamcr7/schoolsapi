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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->index();
            $table->string('lastName')->index();
            $table->string('phoneNumber1');
            $table->string('phoneNumber2')->nullable();
            $table->string('mail')->unique();
            $table->enum('sex', ['M', 'F']);
            $table->longtext('address');
            $table->date('birthDate');
            $table->string('profession');
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
        Schema::dropIfExists('professors');
    }
};
