<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //指标信息表
        Schema::create('ft2_indexes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type')->comment('类型 tumor肿瘤 liver肝功能 renal肾功能 heart心脏功能 immunity免疫 routine_blood血常规');
            $table->tinyInteger('important')->comment('1 重要 0 次重要');
            $table->string('name')->comment('中文名称');
            $table->string('alias')->comment('别名');
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
        Schema::dropIfExists('ft2_indexes');
    }
}
