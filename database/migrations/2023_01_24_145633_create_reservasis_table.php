<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->bigInteger('reserverid');
            $table->bigInteger('contactnumber');
            $table->string('email');
            $table->string('mainpicposition');
            $table->string('mainpicname');
            $table->string('secondpicposition');
            $table->string('secondpicname');
            $table->string('roomname');
            $table->date('reservastiondate');
            $table->time('reservationtimestart');
            $table->time('reservationtimeend');
            $table->string('organization');
            $table->string('eventname');
            $table->string('eventcategory');
            $table->string('eventdescription');
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
        Schema::dropIfExists('reservasis');
    }
};
