<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //文章评论回复表
        Schema::create('ft2_article_comment_responses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('article_id')->index()->comment('文章ID');
            $table->integer('article_comment_id')->index()->comment('文章评论ID');
            $table->integer('article_comment_response_id')->default(0)->comment('如果为回复某一回复，回复ID');
            $table->integer('user_id');
            $table->text('content')->comment('回复内容');
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
        Schema::dropIfExists('ft2_article_comment_responses');
    }
}
