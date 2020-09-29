<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingleAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text _en');
            $table->text('text_ar');
            $table->string('name_en');
            $table->string('name_ar');
            $table->integer('number');
            $table->text('seo_title_ar')->nullable();
            $table->text('seo_title_en')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->text('seo_description_ar')->nullable();
            $table->text('seo_keyword_en')->nullable();
            $table->text('seo_keyword_ar')->nullable();
            $table->tinyInteger('created_by')->nullable();
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
        Schema::dropIfExists('single_abouts');
    }
}
