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
            $table->string('firstname')->index();
            $table->string('lastname')->index();
            $table->string('telephone');
            $table->string('mail')->unique();
            $table->enum('sexe', ['M', 'F']);
            $table->longtext('address');
            $table->date('birthdate');
            $table->string('level')->nullable();
            $table->string('parent_contact')->nullable();
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
