<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->length('255');
            $table->string('country_name')->length('255');
            $table->string('continent')->length('255');  
            $table->timestamp('created_at');
            //$table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
