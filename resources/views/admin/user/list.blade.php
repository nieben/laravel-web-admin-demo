@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="panel-body">
                    <form method="get" class="form-inline" id="search_users_form" action="{{url('/admin/user/list')}}">
                        <div class="form-group" style="width: 15%">
                            <label for="">手机号</label>
                            <input class="form-control" name="mobile"
                                   @if(isset($searchParams['mobile']))
                                   value="{{$searchParams['mobile']}}"
                                   @endif type="text"/>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group" style="width: 15%">
                            <label for="">昵称</label>
                            <input class="form-control" name="nickname"
                                   @if(isset($searchParams['nickname']))
                                   value="{{$searchParams['nickname']}}"
                                   @endif type="text"/>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group" style="width: 10%">
                            <label for="">用户类型</label>
                            <select class="form-control" id="role" name="role">
                                <option value="">全部</option>
                                @foreach ($userRoles as $key => $value)
                                    <option value="{{$key}}"
                                            @if(isset($searchParams['role']) AND $key == $searchParams['role'])
                                            selected
                                            @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                            <label for=""></label>
                            <button class="btn btn-danger form-control" type="submit" id="search_users">搜索</button>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                            <label for=""></label>
                            <a href="{{url('/admin/user/list')}}"><button class="btn btn-danger form-control" type="button">清空条件</button></a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12" id="product_list">
                    <section class="panel">
                        <header class="panel-heading">
                            用户管理
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="14%">手机号</th>
                                <th width="14%">昵称</th>
                                <th width="12%">用户类型</th>
                                <th width="40%">修改</th>
                                <th width="10%">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->mobile}}</td>
                                    <td>{{$row->nickname}}</td>
                                    <td>{{$userRoles[$row->role]}}</td>
                                    <td>
                                        <form method="post" class="form-inline" action="{{url('/admin/user/remark')}}">
                                            {{ csrf_field() }}
                                            <div class="form-group" style="width: 30%">
                                                <select class="form-control" id="role" name="role">
                                                    @foreach ($userRoles as $key => $value)
                                                        <option value="{{$key}}"
                                                                @if ($key == $row->role)
                                                                selected
                                                                @endif>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            &nbsp;&nbsp;备注：
                                            <div class="form-group" style="width: 40%">
                                                <input class="form-control" name="remark" value="{{$row->remark}}" type="text"/>
                                            </div>
                                            &nbsp;&nbsp;
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{$row->id}}">
                                                <button class="btn btn-danger btn-sm form-control" type="button" name="update_remark">更新</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <a title="详情" href="{{url('admin/user/edit/'.$row->id)}}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="text-center">{{ $users->appends($searchParams)->links() }}</div>
                        @if($users->hasMorePages())
                            <div class="text-center" style="margin-top: -15px;">
                                <span style="vertical-align: center">共 <span style="font-weight: bold">{{$users->total()}}</span> 条记录</span>
                            </div>
                        @else
                            <div class="text-center">
                                <span style="vertical-align: center">共 <span style="font-weight: bold">{{$users->total()}}</span> 条记录</span>
                            </div>
                        @endif
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>

@endsection

@section('javascript')
    <link rel="stylesheet" href="{{asset('/js/kindeditor-4.1.7/themes/default/default.css')}}" />
    <script charset="utf-8" src="{{asset('/js/kindeditor-4.1.7/kindeditor-min.js')}}"></script>
    <script charset="utf-8" src="{{asset('/js/kindeditor-4.1.7/lang/zh_CN.js')}}"></script>

    <script>
        $(document).on('click',"button[name='update_remark']",function(){
            var button = $(this);
            button.attr('disabled',true);

            var form = button.parent().parent();

            $.ajax({
                type: 'POST',
                url: form.attr('action') ,
                data: form.serialize() ,
                dataType: 'json',
                beforeSend:function(XMLHttpRequest){
                    $("#loading").html("处理中...");
                },
                success: function(jsonResult){
                    $("#loading").empty();
                    alert(jsonResult.message);
                    button.attr('disabled',false);
                }
            });
        });
    </script>
@endsection