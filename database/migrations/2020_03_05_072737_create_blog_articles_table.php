<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('article_en')->unique();
            $table->string('article_ar')->unique();
            $table->bigInteger('category_id');
            $table->text('images')->nullable();
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
        Schema::dropIfExists('blog_articles');
    }
}
