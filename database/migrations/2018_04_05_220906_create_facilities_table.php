<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('img_path');
            $table->timestamps();
        });

        Schema::create('accomodation_facility', function (Blueprint $table) {
            $table->integer('accomodation_id');
            $table->integer('facility_id');
            $table->primary(['accomodation_id', 'facility_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('accomodation_facility');
    }
}
