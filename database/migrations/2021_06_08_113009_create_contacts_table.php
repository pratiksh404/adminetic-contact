<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->tinyInteger('gender')->default(1);
            $table->string('address')->default('N/A');
            $table->boolean('favorite')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Artisan::call('make:permission Contact --all');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
