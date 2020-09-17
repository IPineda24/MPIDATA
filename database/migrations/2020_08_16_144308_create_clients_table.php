<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable();
            $table->char('DUI',9)->nullable();
            $table->char('phone',8)->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('company_id')->index();
            $table->unsignedBigInteger('lote_id')->index();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
