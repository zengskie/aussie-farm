<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKangaroosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kangaroos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('nickname')->nullable();
            $table->float('weight', 8, 2)->unsigned();
            $table->float('height', 8, 2)->unsigned();
            $table->string('gender', 10);
            $table->string('color', 100)->nullable();
            $table->string('friendliness', 20)->nullable();
            $table->date('birthday');
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
        Schema::dropIfExists('kangaroos');
    }
}
