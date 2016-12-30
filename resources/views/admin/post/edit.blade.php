@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            概要
                            <a href="{{url('/admin/post/list')}}"><button style="float: right;margin-right: 10px" class="btn btn-sm btn-info">返回列表</button></a>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered product-table">
                                <tbody>
                                <tr>
                                    <td width="12%" rowspan="2">
                                        <img src="
                                        @if ($post->avatar != null)
                                        {{$post->avatar}}
                                        @else
                                        {{$defaultAvatar}}
                                        @endif
                                                " style="width: 50px;height: 50px;border-radius:50%; overflow:hidden;" alt=""/>
                                    </td>
                                    <td width="24%">昵称：{{$post->nickname}}</td>
                                    <td width="24%">
                                        类型：
                                        @if($post->role == 0)
                                            普通用户
                                        @elseif($post->role == 1)
                                            医生(未认证)
                                        @elseif($post->role == 2)
                                            医生(已认证)
                                        @elseif($post->role == 3)
                                            管理员
                                        @endif
                                    </td>
                                    <td  width="28%">发帖时间：{{$post->created_at}}</td>
                                    <td width="12%" style="text-align: center">
                                        <input type="hidden" id="id" name="id" value="{{$post->id}}">
                                        <button style="float: right;margin-right: 10px" class="btn btn-danger" type="button" name="disable_post">删除帖子</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>手机号：{{$post->mobile}}</td>
                                    <td>点赞数：{{$post->cheer_number}}</td>
                                    <td>评论数：{{$post->comment_number}}</td>
                                    <td style="text-align: center" id="user_operation">
                                        @if ($post->user_disabled == 0)
                                            <input type="hidden" id="user_id" name="user_id" value="{{$post->user_id}}">
                                            <button style="float: right;margin-right: 10px" class="btn btn-danger" type="button" name="disable_user">拉黑贴主</button>
                                        @elseif ($post->user_disabled == 1)
                                            <span style="color: #ec6459">已拉黑</span>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <header class="panel-heading">
                            正文
                        </header>
                        <div class="panel-body">
                            <textarea class="form-control" id="content" name="content" cols="10" style="width:95%; height: 500px; visibility: hidden;">{{$post->content}}</textarea>
                        </div>
                        <header class="panel-heading">
                            评论
                        </header>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="10%">操作</th>
                                        <th width="10%">头像</th>
                                        <th width="15%">昵称</th>
                                        <th width="15%">时间</th>
                                        <th width="50%">内容</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($responses as $key => $row)
                                        <tr>
                                            <td>
                                                @if (isset($row->comment_id))
                                                    <input type="hidden" name="id" value="{{$row->comment_id}}">
                                                    <input type="hidden" name="type" value="comment">
                                                @else
                                                    <input type="hidden" name="id" value="{{$row->response_id}}">
                                                    <input type="hidden" name="type" value="response">
                                                @endif
                                                <button  class="btn btn-danger btn-sm" type="button" name="disable_comment">删除</button>
                                            </td>
                                            <td>
                                                @if ($row->avatar != null)
                                                    <img src="{{$row->avatar}}" height="30" width="40">
                                                @else
                                                    <img src="{{$defaultAvatar}}" height="30" width="40">
                                                @endif
                                            </td>
                                            <td>{{$row->nickname}}</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>{{$row->content}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        KindEditor.ready(function (K) {
            var editor1 = K.create('textarea[name="content"]', {
                uploadJson: '{{url('/admin/upload_file')}}',
                fileManagerJson: '{{asset('/js/kindeditor-4.1.7/php/file_manager_json.php')}}',
                allowFileManager: true,
                items : []
            });

            $(document).on('click', "button[name='disable_post']", function () {
                if(!confirm('确认要删除该帖子？')) {
                    return;
                }
                var id = $("#id").val();
                $.ajax({
                    type: 'GET',
                    url: "{{url('/admin/post/disable')}}/"+id,
                    dataType: 'json',
                    beforeSend:function(XMLHttpRequest){
                        $("#loading").html("处理中...");
                    },
                    success: function(jsonResult){
                        $("#loading").empty();
                        if(jsonResult.error == 0){
                            if(!alert(jsonResult.message)) {
                                window.location.href= "{{url('/admin/post/list')}}";
                            }
                        }else{
                            alert(jsonResult.message);
                        }
                    }
                });
            });

            $(document).on('click', "button[name='disable_user']", function () {
                if(!confirm('确认要拉黑该用户？')) {
                    return;
                }
                var id = $("#user_id").val();
                $.ajax({
                    type: 'GET',
                    url: "{{url('/admin/user/disable')}}/"+id,
                    dataType: 'json',
                    beforeSend:function(XMLHttpRequest){
                        $("#loading").html("处理中...");
                    },
                    success: function(jsonResult){
                        $("#loading").empty();
                        if(jsonResult.error == 0){
                            if(!alert(jsonResult.message)) {
                                $("#user_operation").html('<span style="color: #ec6459">已拉黑</span>');
                            }
                        }else{
                            alert(jsonResult.message);
                        }
                    }
                });
            });

            $(document).on('click', "button[name='disable_comment']", function () {
                if(!confirm('确认要删除该评论？')) {
                    return;
                }
                var type = $(this).parent().find("input[name='type']").val();
                var id = $(this).parent().find("input[name='id']").val();
                var button = $(this);

                $.ajax({
                    type: 'GET',
                    url: "{{url('/admin/post/disable_comment')}}/"+type+"/"+id,
                    dataType: 'json',
                    beforeSend:function(XMLHttpRequest){
                        $("#loading").html("处理中...");
                    },
                    success: function(jsonResult){
                        $("#loading").empty();
                        if(jsonResult.error == 0){
                            if(!alert(jsonResult.message)) {
                                button.parent().parent().remove();
                            }
                        }else{
                            alert(jsonResult.message);
                        }
                    }
                });
            });
        });
    </script>
@endsection