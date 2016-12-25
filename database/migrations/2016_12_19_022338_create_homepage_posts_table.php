<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepagePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //首页论坛精选帖子配置表
        Schema::create('ft2_homepage_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('post_id')->comment('帖子ID');
            $table->tinyInteger('type')->comment('0:治疗前 1:治疗中 2:治疗后');
            $table->integer('sort')->default(0)->comment('排序 0为第一位');
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
        //
        Schema::dropIfExists('ft2_homepage_posts');
    }
}
