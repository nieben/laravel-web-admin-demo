<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //发帖评论表
        Schema::create('ft2_post_comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('post_id')->index()->comment('帖子ID');
            $table->integer('user_id');
            $table->text('content')->comment('评论内容');
            $table->integer('response_number')->default(0)->comment('回复数量');
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
        Schema::dropIfExists('ft2_post_comments');
    }
}
