@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            添加标签
                            <a href="{{url('/admin/label/list')}}"><button style="float: right;margin-right: 10px" class="btn btn-sm btn-info">返回列表</button></a>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="add_label_form" method="post" action="{{url('/admin/label/add')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">名称</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="name" name="name" value="{{ old('name') }}" type="text" required=""/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="label_category_id" class="control-label col-lg-2">分类</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" id="label_category_id" name="label_category_id">
                                                @foreach ($label_categories as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
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
    <script>
        $(document).on('click','#submit_form',function(){
            if($("#name").val() == '') {
                alert("名称不能为空！");
                return;
            }
            $('#submit_form').attr('disabled',true);

            $.ajax({
                type: 'POST',
                url: $("#add_label_form").attr('action') ,
                data: $("#add_label_form").serialize() ,
                dataType: 'json',
                beforeSend:function(XMLHttpRequest){
                    $("#loading").html("处理中...");
                },
                success: function(jsonResult){
                    $("#loading").empty();
                    if(jsonResult.error == 0){
                        if(!alert(jsonResult.message)) {
                            window.location.href= "{{url('/admin/label/list')}}";
                        }
                    }else{
                        alert(jsonResult.message);
                    }
                    $('#submit_form').attr('disabled',false);
                }
            });
        });
    </script>
@endsection