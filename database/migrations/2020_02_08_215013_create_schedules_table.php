<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('class_1')->nullable();
            $table->integer('class_2')->nullable();
            $table->integer('class_3')->nullable();
            $table->integer('class_4')->nullable();
            $table->integer('class_5')->nullable();
            $table->integer('class_6')->nullable();
            $table->integer('class_7')->nullable();
            $table->integer('class_8')->nullable();
            $table->integer('class_9')->nullable();
            $table->integer('class_10')->nullable();
            $table->integer('class_11')->nullable();
            $table->integer('class_12')->nullable();
            $table->integer('class_13')->nullable();
            $table->integer('class_14')->nullable();
            $table->integer('class_15')->nullable();
            $table->integer('class_16')->nullable();
            $table->integer('class_17')->nullable();
            $table->integer('class_18')->nullable();
            $table->integer('class_19')->nullable();
            $table->integer('class_20')->nullable();
            $table->integer('class_21')->nullable();
            $table->integer('class_22')->nullable();
            $table->integer('class_23')->nullable();
            $table->integer('class_24')->nullable();
            $table->integer('class_25')->nullable();
            $table->integer('class_26')->nullable();
            $table->integer('class_27')->nullable();
            $table->integer('class_28')->nullable();
            $table->integer('class_29')->nullable();
            $table->integer('class_30')->nullable();
            $table->integer('class_31')->nullable();
            $table->integer('class_32')->nullable();
            $table->integer('class_33')->nullable();
            $table->integer('class_34')->nullable();
            $table->integer('class_35')->nullable();
            $table->integer('class_36')->nullable();
            $table->integer('color_1')->default(0);
            $table->integer('color_2')->default(0);
            $table->integer('color_3')->default(0);
            $table->integer('color_4')->default(0);
            $table->integer('color_5')->default(0);
            $table->integer('color_6')->default(0);
            $table->integer('color_7')->default(0);
            $table->integer('color_8')->default(0);
            $table->integer('color_9')->default(0);
            $table->integer('color_10')->default(0);
            $table->integer('color_11')->default(0);
            $table->integer('color_12')->default(0);
            $table->integer('color_13')->default(0);
            $table->integer('color_14')->default(0);
            $table->integer('color_15')->default(0);
            $table->integer('color_16')->default(0);
            $table->integer('color_17')->default(0);
            $table->integer('color_18')->default(0);
            $table->integer('color_19')->default(0);
            $table->integer('color_20')->default(0);
            $table->integer('color_21')->default(0);
            $table->integer('color_22')->default(0);
            $table->integer('color_23')->default(0);
            $table->integer('color_24')->default(0);
            $table->integer('color_25')->default(0);
            $table->integer('color_26')->default(0);
            $table->integer('color_27')->default(0);
            $table->integer('color_28')->default(0);
            $table->integer('color_29')->default(0);
            $table->integer('color_30')->default(0);
            $table->integer('color_31')->default(0);
            $table->integer('color_32')->default(0);
            $table->integer('color_33')->default(0);
            $table->integer('color_34')->default(0);
            $table->integer('color_35')->default(0);
            $table->integer('color_36')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('schedules');
    }
}
