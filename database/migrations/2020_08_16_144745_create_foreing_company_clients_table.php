<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeingCompanyClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'books',
            function (Blueprint $table) {
                $table->foreign('customer_id')->references('id')->on('customers');
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
            'books',
            function (Blueprint $table) {
                $table->dropForeign(['customer_id']);
            }
        );
    }
}
