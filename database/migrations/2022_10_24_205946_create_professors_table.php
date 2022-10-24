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
            $table->string('firstname')->index();
            $table->string('lastname')->index();
            $table->string('telephone1');
            $table->string('telephone2');
            $table->string('mail')->unique();
            $table->enum('sexe', ['M', 'F']);
            $table->longtext('address');
            $table->date('birthdate');
            $table->string('module');
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
