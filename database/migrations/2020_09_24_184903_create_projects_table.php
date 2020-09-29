<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('proj_name_en');
            $table->string('proj_name_ar');
            $table->text('images');
            $table->text('link');
            $table->text('category_id');
            $table->tinyInteger('created_by')->nullable();
            $table->string('	seo_title_ar')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->string('seo_description_en')->nullable();
            $table->string('seo_description_ar')->nullable();
            $table->string('seo_keyword_en')->nullable();
            $table->string('seo_keyword_ar')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
