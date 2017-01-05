<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户指标信息表
        Schema::create('ft2_user_informations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->json('index_information')->nullable()->comment('指标信息 json key=>value key大写');
            $table->json('tumour_function_index')->nullable()->comment('肿瘤指标 json 格式为 [CEA => [2016-02-01 => 值, 2016-03-01 => 值], 肿瘤大小 => [2016-02-01 => 值, 2016-03-01 => 值]]');
            $table->json('liver_function_index')->nullable()->comment('肝功能指标 json');
            $table->json('renal_function_index')->nullable()->comment('肾功能指标 json');
            $table->json('heart_function_index')->nullable()->comment('心脏功能指标 json');
            $table->json('immunity_function_index')->nullable()->comment('免疫功能指标 json');
            $table->json('routine_blood_index')->nullable()->comment('血常规指标 json');
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
        Schema::dropIfExists('ft2_user_informations');
    }
}
