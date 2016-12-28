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
                            <a href="{{url('/admin/article/list')}}"><button style="float: right;margin-right: 10px" class="btn btn-sm btn-info">返回列表</button></a>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered product-table">
                                <tbody>
                                <tr>
                                    <td>
                                        状态：
                                        @if($article->status == 0)
                                            <span style="color: #ec6459">草稿</span><br>{{$article->updated_at}}
                                        @elseif($article->status == 1)
                                            <span style="color: #6dbb4a">已发布</span><br>{{$article->updated_at}}
                                        @endif
                                    </td>
                                    <td>点赞数：{{$article->cheer_number}}</td>
                                    <td>评论数：{{$article->comment_number}}</td>
                                    <td rowspan="2" style="text-align: center"><button style="float: right;margin-right: 10px" class="btn btn-danger" type="button" name="disable_article">删除文章</button></td>
                                </tr>
                                <tr>
                                    <td>评论：
                                        @if($article->allow_comment == 1)
                                            <span style="color: #6dbb4a">已开启</span>
                                        @elseif($article->allow_comment == 0)
                                            <span style="color: #ec6459">已关闭</span>
                                        @endif
                                    </td>
                                    <td>点击量：{{$article->click_number}}</td>
                                    <td>最后回复时间：{{$article->last_response}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <header class="panel-heading">
                            编辑
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="edit_article_form" method="post" action="{{url('/admin/article/edit')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group ">
                                        <label for="title" class="control-label col-lg-2">标题</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="title" name="title" value="{{$article->title}}" type="text" required=""/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="description" class="control-label col-lg-2">题图</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="title_image" id="title_image" required="" readonly value="{{$article->title_image}}">
                                                </div>
                                                <div class="col-lg-1">
                                                    <input type="button" id="title_image_button" value="选择图片" />
                                                </div>
                                                <div class="col-lg-2">
                                                    <img id="title_image_img" src="{{$article->title_image}}" style="width: 80px;height: 60px" alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="article_category_id" class="control-label col-lg-2">分类</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" id="article_category_id" name="article_category_id">
                                                @foreach ($article_categories as $row)
                                                    <option value="{{$row->id}}"
                                                            @if($article->article_category_id == $row->id)
                                                                selected
                                                            @endif
                                                    >{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-lg-2">标签</label>
                                        <div class="col-lg-10">
                                            @foreach ($labels as $key => $row)
                                                <div class="checkbox-inline">
                                                    <input id="checkbox{{$key}}"
                                                           @if(in_array($row->id, $article->labels_arr))
                                                                   checked
                                                           @endif
                                                           name="label[]" value="{{$row->id}}" type="checkbox">
                                                    <label for="checkbox{{$key}}">
                                                        {{$row->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="content" class="control-label col-lg-2">正文</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control" id="content" name="content" cols="10" style="height: 500px; visibility: hidden;">{{$article->content}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="control-label col-lg-2">状态</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" id="status" name="status">
                                                <option value="0"
                                                        @if($article->status == 0)
                                                        selected
                                                        @endif
                                                >草稿</option>
                                                <option value="1"
                                                        @if($article->status == 1)
                                                        selected
                                                        @endif
                                                >发布</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="allow_comment" class="control-label col-lg-2">允许评论</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" id="allow_comment" name="allow_comment">
                                                <option value="1"
                                                        @if($article->allow_comment == 1)
                                                        selected
                                                        @endif
                                                >允许</option>
                                                <option value="0"
                                                        @if($article->allow_comment == 0)
                                                        selected
                                                        @endif
                                                >不允许</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" class="control-label col-lg-2">
                                        <div class="col-lg-offset-2 col-lg-4">
                                            <input type="hidden" id="id" name="id" value="{{$article->id}}">
                                            <button class="btn btn-danger" type="button" id="submit_form">提交</button>
                                        </div>
                                    </div>
                                    <div id="loding"></div>
                                </form>
                            </div>
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
                                                <img src="{{$default_avatar}}" height="30" width="40">
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
                allowFileManager: true
            });

            var editor2 = K.editor({
                allowFileManager: true,
                uploadJson : '{{url('/admin/upload_file')}}'
            });

            K('#title_image_button').click(function () {
                editor2.loadPlugin('image', function () {
                    editor2.plugin.imageDialog({
                        showRemote: false,
                        imageUrl: K('#title_image').val(),
                        clickFn: function (url, title, width, height, border, align) {
                            K('#title_image').val(url);
                            document.getElementById("title_image_img").src = url;
                            editor2.hideDialog();
                        }
                    });
                });
            });

            $(document).on('click','#submit_form',function(){
                if($("#title").val() == '') {
                    alert("标题不能为空！");
                    return;
                }
                if($("#title_image").val() == '') {
                    alert("题图不能为空！");
                    return;
                }
                $("textarea[name='content']").val(editor1.html());
                $('#submit_form').attr('disabled',true);

                $.ajax({
                    type: 'POST',
                    url: $("#edit_article_form").attr('action') ,
                    data: $("#edit_article_form").serialize() ,
                    dataType: 'json',
                    beforeSend:function(XMLHttpRequest){
                        $("#loading").html("处理中...");
                    },
                    success: function(jsonResult){
                        $("#loading").empty();
                        alert(jsonResult.message);
                        $('#submit_form').attr('disabled',false);
                    }
                });
            });

            $(document).on('click', "button[name='disable_article']", function () {
                if(!confirm('确认要删除该文章？')) {
                    return;
                }
                var id = $("#id").val();
                $.ajax({
                    type: 'GET',
                    url: "{{url('/admin/article/disable')}}/"+id,
                    dataType: 'json',
                    beforeSend:function(XMLHttpRequest){
                        $("#loading").html("处理中...");
                    },
                    success: function(jsonResult){
                        $("#loading").empty();
                        if(jsonResult.error == 0){
                            if(!alert(jsonResult.message)) {
                                window.location.href= "{{url('/admin/article/list')}}";
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
                    url: "{{url('/admin/article/disable_comment')}}/"+type+"/"+id,
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