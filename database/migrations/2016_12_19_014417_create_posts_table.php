<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户发帖表
        Schema::create('ft2_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('forum_section_id')->comment('所属父版块ID');
            $table->integer('forum_sub_section_id')->comment('所属子版块ID');
            $table->integer('user_id')->index()->comment('作者ID');
            $table->string('title')->comment('标题');
            $table->string('labels')->nullable()->comment('1,2,3主键 逗号分隔');
            $table->text('content')->comment('正文 html内容');
            $table->integer('click_number')->default(0)->comment('点击数量');
            $table->integer('cheer_number')->default(0)->comment('加油数量');
            $table->integer('comment_number')->default(0)->comment('评论数量');
            $table->dateTime('last_response')->nullable()->comment('最后回复时间');
            $table->tinyInteger('disabled')->default(0)->comment('软删除 0否 1是');
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
        Schema::dropIfExists('ft2_posts');
    }
}
