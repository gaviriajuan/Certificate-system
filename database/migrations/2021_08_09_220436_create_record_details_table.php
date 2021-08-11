<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_official')->constrained('officials');
            $table->foreignId('id_types_certificate')->constrained('types_certificates');
            $table->datetime('fec_generation');
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
        Schema::dropIfExists('record_details');
    }
}
