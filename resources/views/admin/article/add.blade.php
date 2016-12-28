@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            添加文章
                            <a href="{{url('/admin/article/list')}}"><button style="float: right;margin-right: 10px" class="btn btn-sm btn-info">返回列表</button></a>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="add_article_form" method="post" action="{{url('/admin/article/add')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group ">
                                        <label for="title" class="control-label col-lg-2">标题</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="title" name="title" value="{{ old('title') }}" type="text" required=""/>
                                            @if ($errors->has('title'))
                                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="description" class="control-label col-lg-2">题图</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="title_image" id="title_image" required="" readonly value="">
                                                </div>
                                                <div class="col-lg-1">
                                                    <input type="button" id="title_image_button" value="选择图片" />
                                                </div>
                                                <div class="col-lg-2">
                                                    <img id="title_image_img" src="" style="width: 80px;height: 60px" alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="article_category_id" class="control-label col-lg-2">分类</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" id="article_category_id" name="article_category_id">
                                                @foreach ($article_categories as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-lg-2">标签</label>
                                        <div class="col-lg-10">
                                            @foreach ($labels as $key => $row)
                                            <div class="checkbox-inline">
                                                <input id="checkbox{{$key}}" name="label[]" value="{{$row->id}}" type="checkbox">
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
                                            <textarea class="form-control" id="content" name="content" cols="10" style="height: 500px; visibility: hidden;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="control-label col-lg-2">状态</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" id="status" name="status">
                                                <option value="0">草稿</option>
                                                <option value="1">发布</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="allow_comment" class="control-label col-lg-2">允许评论</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" id="allow_comment" name="allow_comment">
                                                <option value="1">允许</option>
                                                <option value="0">不允许</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" class="control-label col-lg-2">
                                        <div class="col-lg-offset-2 col-lg-4">
                                            <button class="btn btn-danger" type="button" id="submit_form">提交</button>
                                        </div>
                                    </div>
                                    <div id="loding"></div>
                                </form>
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
                    url: $("#add_article_form").attr('action') ,
                    data: $("#add_article_form").serialize() ,
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
                        $('#submit_form').attr('disabled',false);
                    }
                });
            });
        });
    </script>
@endsection