<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
        $table->softDeletes();
        $table->id();
        $table->char('N_lote',6)->nullable()->unique();
        $table->char('price',8,2)->nullable();
        $table->char('quota',8,2)->nullable();
        $table->integer('prima')->nullable();
        $table->integer('square_meters')->nullable();
        $table->string('status')->nullable();
        $table->unsignedBigInteger('company_id')->index();
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
        Schema::dropIfExists('lotes');
    }
}
