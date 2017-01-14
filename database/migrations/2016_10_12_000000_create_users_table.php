<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户表
        Schema::create('ft2_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mobile')->unique()->comment('手机号，唯一');
            $table->string('nickname')->unique()->nullable()->comment('昵称');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('password')->nullable()->comment('密码');
            $table->tinyInteger('role')->default(0)->comment('角色 0:普通用户 1:医生(未认证) 2：医生(已认证) 3:管理员');
            $table->string('remark')->nullable()->comment('备注信息');
            $table->tinyInteger('information_filled')->default(0)->comment('信息是否填写过 0否 1是');
            $table->char('sex', 1)->nullable()->comment('性别 F/M');
            $table->date('birthday')->nullable()->comment('生日');
            $table->tinyInteger('smoke_history')->nullable()->comment('吸烟史, 0:无 1:有');
            $table->string('real_name')->nullable()->comment('真实姓名');
            $table->string('hospital')->nullable()->comment('所在医院');
            $table->string('department')->nullable()->comment('所属科室');
            $table->date('diagnosis_time')->nullable()->comment('确诊时间');
            $table->string('pathologic_type')->nullable()->comment('病理类型');
            $table->string('disease_stage')->nullable()->comment('疾病分期 1, 2, 3, 4, la, lb');
            $table->json('metastatic_lesion')->nullable()->comment('转移病灶 json');
            $table->string('genic_mutation')->nullable()->comment('基因突变');
            $table->string('test_method')->nullable()->comment('检测方法 0:组织标本（活检）1:血液标本 2:胸水蜡块');
            $table->tinyInteger('disabled')->default(0)->comment('是否禁用 0否 1是');
            $table->rememberToken();
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
        Schema::dropIfExists('ft2_users');
    }
}
