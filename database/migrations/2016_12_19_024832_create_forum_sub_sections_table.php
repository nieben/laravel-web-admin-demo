<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumSubSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //论坛子版块信息表
        Schema::create('ft2_forum_sub_sections', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('forum_section_id')->comment('父版块ID');
            $table->string('name')->comment('名称');
            $table->string('description')->nullable()->comment('描述');
            $table->string('logo_image')->comment('logo图片');
            $table->integer('sort')->default(0)->comment('排序 0为第一位');
            $table->tinyInteger('disabled')->default(0)->comment('隐藏禁用 0:否 1:是');
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
        Schema::dropIfExists('ft2_forum_sub_sections');
    }
}
