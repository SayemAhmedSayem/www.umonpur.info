<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('version_title')->nullable();
            $table->string('version_subtitle')->nullable();
            $table->string('description_title_p1')->nullable();
            $table->string('description_title_p2')->nullable();
            $table->text('description_details')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('versions');
    }
}
