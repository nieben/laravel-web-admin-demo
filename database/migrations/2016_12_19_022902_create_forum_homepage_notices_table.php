<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumHomepageNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //论坛首页公告信息表
        Schema::create('ft2_forum_homepage_notices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('text')->comment('文本内容');
            $table->string('link_url')->nullable()->comment('链接地址');
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
        Schema::dropIfExists('ft2_forum_homepage_notices');
    }
}
