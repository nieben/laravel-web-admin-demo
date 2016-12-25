<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //banner表
        Schema::create('ft2_banners', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('position')->comment('位置，home_top:首页顶部');
            $table->string('image')->comment('图片');
            $table->string('title')->comment('标题');
            $table->integer('article_id')->comment('跳转文章ID');
            $table->integer('sort')->default(2147483647)->comment('排序 0排第一位');
            $table->tinyInteger('disabled')->default(0)->comment('隐藏 0否 1是');
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
        Schema::dropIfExists('ft2_banners');
    }
}
