<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->timestamp('activation_date');
            $table->timestamp('due_date');
            $table->text('observations')->nullable();
            $table->string('serial_number')->unique();
            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();

            // Foreign keys
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('system_id');

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('system_id')->references('id')->on('systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses');
    }
}
