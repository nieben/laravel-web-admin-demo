<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //论坛版块信息表
        Schema::create('ft2_forum_sections', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->comment('名称');
            $table->string('description')->nullable()->comment('描述');
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
        Schema::dropIfExists('ft2_forum_sections');
    }
}
