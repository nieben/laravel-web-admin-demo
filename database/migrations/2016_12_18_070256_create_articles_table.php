<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //文章表
        Schema::create('ft2_articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('title_image')->comment('题图');
            $table->integer('article_category_id')->comment('文章分类ID');
            $table->string('labels')->nullable()->comment('1,2,3主键 逗号分隔');
            $table->text('content')->comment('正文 html内容');
            $table->tinyInteger('display_comment')->comment('是否显示发布时间，加油，评论记录 0否 1是');
            $table->tinyInteger('allow_comment')->comment('是否允许评论 0否 1是');
            $table->integer('click_number')->default(0)->comment('点击量');
            $table->integer('cheer_number')->default(0)->comment('加油数量');
            $table->integer('comment_number')->default(0)->comment('评论数量');
            $table->integer('last_response')->default(0)->comment('最后回复时间');
            $table->integer('sort')->default(2147483647)->comment('排序 0排第一位');
            $table->tinyInteger('status')->default(0)->comment('状态 0：草稿 1：发布');
            $table->tinyInteger('disabled')->default(0)->comment('软删除 0否 1是');
            $table->dateTime('release_time')->nullable()->comment('发布时间');
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
        Schema::dropIfExists('ft2_articles');
    }
}
