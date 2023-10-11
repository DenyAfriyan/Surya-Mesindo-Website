<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('testimoni')->nullable();
            $table->string('company')->nullable();
            $table->string('job')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
