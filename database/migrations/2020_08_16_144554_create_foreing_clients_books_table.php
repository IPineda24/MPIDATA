<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeingClientsBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'Customers',
            function (Blueprint $table) {
                $table->foreign('lote_id')->references('id')->on('lotes');
                
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'Customers',
            function (Blueprint $table) {
                $table->dropForeign(['lote_id']);
                
            }
        );
    }
}
