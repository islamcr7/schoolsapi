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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->index();
            $table->string('lastName')->index();
            $table->string('phoneNumber');
            $table->string('mail')->unique();
            $table->enum('sex', ['M', 'F']);
            $table->longtext('address');
            $table->date('birthdate');
            $table->string('level')->nullable();
            $table->string('parentContact')->nullable();
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
        Schema::dropIfExists('students');
    }
};
