<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataVisualizationConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //数据可视化配置表
        Schema::create('ft2_data_visualization_config', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('description')->nullable()->comment('描述');
            $table->string('position')->comment('位置 homepage, forum_homepage, forum_list, article_list, article_detail, personal_information');
            $table->tinyInteger('display_form')->comment('展示形式 0:饼图 1:柱状图...');
            $table->tinyInteger('source_type')->comment('数据来源 0:手动输入 1:数据库');
            $table->json('config_data')->nullable()->comment('手动配置的数据 json');
            $table->dateTime('start_time')->nullable()->comment('范围开始时间');
            $table->dateTime('end_time')->nullable()->comment('范围结束时间');
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
        Schema::dropIfExists('ft2_data_visualization_config');
    }
}
