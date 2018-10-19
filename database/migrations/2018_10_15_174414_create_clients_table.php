<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proposal_type');
            $table->string('technical_approval_from');
            $table->integer('proposal_number');
            $table->string('client_source');
            $table->string('sales_agent');
            $table->string('client_name');
            $table->date('proposal_date');
            $table->integer('proposal_value');
            $table->string('proposal_code')->unique();
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
