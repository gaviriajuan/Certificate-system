<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('names',100);
            $table->string('surnames',100);
            $table->string('doc_number');
            $table->string('email');
            $table->string('phone');
            $table->datetime('fec_contract');
            $table->datetime('fec_entry');
            $table->string('address');
            $table->foreignId('id_contract')->constrained('types_contracts');
            $table->foreignId('id_charges')->constrained('charges');
            $table->foreignId('id_eps')->constrained('eps');
            $table->foreignId('id_arls')->constrained('arls');
            $table->foreignId('id_cjcompensation')->constrained('cj_compensations');
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
        Schema::dropIfExists('officials');
    }
}
