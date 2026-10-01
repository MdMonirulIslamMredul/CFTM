<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('attribute_id');
            $table->string('field_1');
            $table->string('field_2');
            $table->string('field_3');
            $table->string('field_4');
            $table->string('field_5');
            $table->tinyInteger('status')->default(1)->comment("1= active; 0=deactive");
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
        Schema::dropIfExists('attribute_infos');
    }
}
