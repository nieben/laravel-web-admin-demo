@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            添加banner
                            <a href="{{url('/admin/banner/list')}}"><button style="float: right;margin-right: 10px" class="btn btn-sm btn-info">返回列表</button></a>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="add_banner_form" method="post" action="{{url('/admin/banner/add')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group ">
                                        <label for="article_id" class="control-label col-lg-2">文章编号</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="article_id" name="article_id" value="{{ old('article_id') }}" type="text" required=""/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="title" class="control-label col-lg-2">标题</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="title" name="title" value="{{ old('title') }}" type="text" required=""/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="description" class="control-label col-lg-2">图片</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="image" id="image" required="" readonly value="">
                                                </div>
                                                <div class="col-lg-1">
                                                    <input type="button" id="image_button" value="选择图片" />
                                                </div>
                                                <div class="col-lg-2">
                                                    <img id="image_img" src="" style="width: 80px;height: 60px" alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="control-label col-lg-2">状态</label>
                                        <div class="col-lg-8">
                                            <div class="radio3 radio-check radio-inline">
                                                <input id="radio1" name="disabled" value="0" type="radio">
                                                <label for="radio1">
                                                    隐藏
                                                </label>
                                            </div>
                                            <div class="radio3 radio-check radio-inline">
                                                <input id="radio2" name="disabled" value="1" type="radio">
                                                <label for="radio2">
                                                    显示
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="sort" class="control-label col-lg-2">排序</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="sort" name="sort" value="0" type="text" required=""/>
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
            var editor2 = K.editor({
                allowFileManager: true,
                uploadJson : '{{url('/admin/upload_file')}}'
            });

            K('#image_button').click(function () {
                editor2.loadPlugin('image', function () {
                    editor2.plugin.imageDialog({
                        showRemote: false,
                        imageUrl: K('#image').val(),
                        clickFn: function (url, title, width, height, border, align) {
                            K('#image').val(url);
                            document.getElementById("image_img").src = url;
                            editor2.hideDialog();
                        }
                    });
                });
            });

            $(document).on('click','#submit_form',function(){
                if($("#article_id").val() == '') {
                    alert("文章不能为空！");
                    return;
                }
                if($("#title").val() == '') {
                    alert("标题不能为空！");
                    return;
                }
                if($("#image").val() == '') {
                    alert("图片不能为空！");
                    return;
                }
                if($('input:radio[name="disabled"]:checked').val() == null) {
                    alert("请选择状态！");
                    return;
                }
                if($("#sort").val() == '') {
                    alert("排序不能为空！");
                    return;
                }
                $('#submit_form').attr('disabled',true);

                $.ajax({
                    type: 'POST',
                    url: $("#add_banner_form").attr('action') ,
                    data: $("#add_banner_form").serialize() ,
                    dataType: 'json',
                    beforeSend:function(XMLHttpRequest){
                        $("#loading").html("处理中...");
                    },
                    success: function(jsonResult){
                        $("#loading").empty();
                        if(jsonResult.error == 0){
                            if(!alert(jsonResult.message)) {
                                window.location.href= "{{url('/admin/banner/list')}}";
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