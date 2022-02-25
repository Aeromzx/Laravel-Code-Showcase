<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();

            //basic values
            $table->integer('customerType'); //0 -> Customer //1 -> Partner
            $table->string('customerCompanyName');
            $table->string('customerCompanyLocationStreet');
            $table->string('customerCompanyLocationPostCode');
            $table->string('customerCompanyLocationCity');
            $table->string('customerContactPersonFirstName');
            $table->string('customerContactPersonLastName');
            $table->string('customerContactPersonPhone');
            $table->string('customerContactPersonMail');

            //Later
            $table->integer('maintenanceContractKey')->default(0);

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
        Schema::dropIfExists('customer');
    }
}
