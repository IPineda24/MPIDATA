<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'lotes',
            function (Blueprint $table) {
                $table->foreign('company_id')->references('id')->on('companies');
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
            'lotes',
            function (Blueprint $table) {
                $table->dropForeign(['company_id']);
            }
        );
    }
}
