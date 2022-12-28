<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNIDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_i_d_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->bigInteger('nid')->nullable();
            $table->string('name')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('holding_no')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('status')->nullable();
            $table->bigInteger('user_id')->nullable();
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
        Schema::dropIfExists('n_i_d_s');
    }
}
