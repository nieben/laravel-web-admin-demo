@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            用户
                            <a href="{{url('/admin/user/list')}}"><button style="float: right;margin-right: 10px" class="btn btn-sm btn-info">返回列表</button></a>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered product-table">
                                <tbody>
                                <tr>
                                    <td width="12%" rowspan="2">
                                        <img src="
                                        @if ($user->avatar != null)
                                                {{$user->avatar}}
                                                @else
                                                {{$defaultAvatar}}
                                                @endif
                                     " style="width: 50px;height: 50px;border-radius:50%; overflow:hidden;" alt=""/>
                                    </td>
                                    <th width="16%">昵称：</th>
                                    <td width="28%">{{$user->nickname}}</td>
                                    <th width="16%">手机号：</th>
                                    <td width="28%">{{$user->mobile}}</td>
                                </tr>
                                <tr>
                                    <th>用户类型：</th>
                                    <td>
                                        @if($user->role == 0)
                                            普通用户
                                        @elseif($user->role == 1)
                                            医生(未认证)
                                        @elseif($user->role == 2)
                                            医生(已认证)
                                        @elseif($user->role == 3)
                                            管理员
                                        @endif
                                    </td>
                                    <th>注册时间：</th>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <header class="panel-heading">
                            基本信息
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered product-table">
                                <tbody>
                                <tr>
                                    <th>性别</th>
                                    <th>生日</td>
                                    <th>吸烟史</td>
                                    <th>确诊日期</td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($user->sex == 'F')
                                            女
                                        @elseif($user->sex == 'M')
                                            男
                                        @endif
                                    </td>
                                    <td>
                                        {{$user->birthday}}
                                        @if ($user->age != '')
                                            | {{$user->age}}岁
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->smoke_history == 0)
                                            无
                                        @else
                                            有
                                        @endif
                                    </td>
                                    <td>{{$user->diagnosis_time}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <header class="panel-heading">
                            病理信息
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered product-table">
                                <tbody>
                                <tr>
                                    <th width="11%">病理类型：</th>
                                    <td width="22%">{{$user->pathologic_type}}</td>
                                    <th width="11%">疾病分期：</th>
                                    <td width="22%">{{$user->disease_stage}}</td>
                                    <th width="11%">转移病灶：</th>
                                    <td width="23%">{{$user->metastatic_lesion}}</td>
                                </tr>
                                <tr>
                                    <th>基因突变：</th>
                                    <td>{{$user->genic_mutation}}</td>
                                    <th>检测方法：</th>
                                    <td>{{$user->test_method}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <header class="panel-heading">
                            核心数据
                        </header>
                        <div id="core_data" class="panel-body">

                            @if (! empty($userInformation['functions']))

                            <form method="post" class="form-inline" id="search_indexes_form" action="{{url('/admin/user/index_data')}}">
                                {{ csrf_field() }}
                                <div class="form-group" style="width: 15%">
                                    <select class="form-control" id="function" name="function">
                                        @foreach ($userInformation['functions'] as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                </div>
                                &nbsp;&nbsp;
                                <div class="form-group" style="width: 10%">
                                    <select class="form-control" id="index" name="index">
                                        <option value="0">全部</option>
                                        @foreach ($userInformation['indexes'] as $value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>

                            <br/>

                            <table id="core_data_table" class="table table-bordered product-table">
                                <tbody>
                                <tr>
                                    <th></th>
                                    @foreach ($userInformation['data'][$userInformation['indexes'][0]] as $key => $value)
                                        <th>{{$key}}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>{{$userInformation['indexes'][0]}}</td>
                                    @foreach ($userInformation['data'][$userInformation['indexes'][0]] as $key => $value)
                                        <td>{{$value}}</td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>

                            @endif

                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>

@endsection

@section('javascript')
    <script>
        $(document).on('change','#function',function(){
            var data = $("#search_indexes_form").serializeArray();

            console.log(data);

            var type = {
                'name': 'type',
                'value': 'function'
            };
            data.push(type);

            $.ajax({
                type: 'POST',
                url: $("#search_indexes_form").attr('action'),
                data: data,
                success: function(result){
                    $("div#core_data").html(result);
                }
            });
        });

        $(document).on('change','#index',function(){
            var data = $("#search_indexes_form").serializeArray();

            var type = {
                'name': 'type',
                'value': 'index'
            };
            data.push(type);

            $.ajax({
                type: 'POST',
                url: $("#search_indexes_form").attr('action'),
                data: data,
                success: function(result){
                    $("table#core_data_table").html(result);
                }
            });
        });
    </script>
@endsection