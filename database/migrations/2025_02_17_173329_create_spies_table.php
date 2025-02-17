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
        Schema::create('spies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->foreignId('agency_id')->constrained()->onDelete('cascade');
            $table->string('country_of_operation');
            $table->date('date_of_birth');
            $table->date('date_of_death')->nullable();
            $table->timestamps();

            $table->unique(['name', 'surname', 'agency_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spies');
    }
};
