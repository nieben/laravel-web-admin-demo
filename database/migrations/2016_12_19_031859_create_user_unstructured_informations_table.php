<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUnstructuredInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户非结构化信息表
        Schema::create('ft2_user_unstructured_informations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->tinyInteger('type')->comment('关联类型 0:用药历史..');
            $table->tinyInteger('data_type')->comment('数据类型 text:文本 image:图片');
            $table->string('data')->comment('数据 文本，图片url等');
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
        Schema::dropIfExists('ft2_user_unstructured_informations');
    }
}
