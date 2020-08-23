<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('service_type')->nullable();
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->string('unit')->nullable();
            $table->double('commission')->nullable();
            $table->string('vehicle')->nullable();
            $table->double('driver_radius')->nullable();
            $table->double('max_distance')->nullable();
            $table->mediumText('description')->nullable();
            $table->double('perkm')->nullable();
            $table->double('fixed')->nullable();
            $table->string('icon')->nullable();
            $table->tinyInteger('status')->comment('1=Enable,2=Disable')->default(1);
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
        Schema::dropIfExists('services');
    }
}
