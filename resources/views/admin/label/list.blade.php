@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="panel-body">
                    <form method="get" class="form-inline" id="search_labels_form" action="{{url('/admin/label/list')}}">
                        <div class="form-group" style="width: 10%">
                            <label for="">分类</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">全部</option>
                                @foreach ($label_categories as $row)
                                    <option value="{{$row->id}}"
                                            @if(isset($searchParams['category_id']) AND $row->id == $searchParams['category_id'])
                                            selected
                                            @endif>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group" style="width: 20%">
                            <label for="">名称</label>
                            <input class="form-control" name="key_word"
                                   @if(isset($searchParams['key_word']))
                                   value="{{$searchParams['key_word']}}"
                                   @endif type="text"/>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                            <label for=""></label>
                            <button class="btn btn-danger form-control" type="submit" id="search_labels">搜索</button>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                            <label for=""></label>
                            <a href="{{url('/admin/label/list')}}"><button class="btn btn-danger form-control" type="button">清空条件</button></a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12" id="product_list">
                    <section class="panel">
                        <header class="panel-heading">
                            标签管理
                            &nbsp;&nbsp;<a href="{{url('/admin/label/add')}}"><button class='btn btn-info btn-sm'>新建标签</button></a>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="18%">名称</th>
                                <th width="16%">分类</th>
                                <th width="18%">创建时间</th>
                                <th width="15%">状态</th>
                                <th width="18%">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($labels as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->category_name}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        @if($row->disabled == 0)
                                            <span style="color: #6dbb4a">正常</span>
                                        @elseif($row->disabled == 1)
                                            <span style="color: #ec6459">隐藏</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->disabled == 0)
                                            <button name="disable_label" class="btn btn-sm btn-info">隐藏</button>
                                        @elseif($row->disabled == 1)
                                            <button name="enable_label" class="btn btn-sm btn-info">开启</button>
                                        @endif
                                        <input type="hidden" name="id" value="{{$row->id}}">
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="text-center">{{ $labels->appends($searchParams)->links() }}</div>
                        @if($labels->hasMorePages())
                            <div class="text-center" style="margin-top: -15px;">
                                <span style="vertical-align: center">共 <span style="font-weight: bold">{{$labels->total()}}</span> 条记录</span>
                            </div>
                        @else
                            <div class="text-center">
                                <span style="vertical-align: center">共 <span style="font-weight: bold">{{$labels->total()}}</span> 条记录</span>
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
    <script>
        $(document).on('click', "button[name='disable_label']", function () {
            if(!confirm('确认要隐藏该标签？')) {
                return;
            }

            var type = 'disable';
            var id = $(this).parent().find("input[name='id']").val();
            var button = $(this);

            $.ajax({
                type: 'GET',
                url: "{{url('/admin/label/edit')}}/"+type+"/"+id,
                dataType: 'json',
                beforeSend:function(XMLHttpRequest){
                    $("#loading").html("处理中...");
                },
                success: function(jsonResult){
                    $("#loading").empty();
                    if(jsonResult.error == 0){
                        if(!alert(jsonResult.message)) {
                            button.parent().prev().html('<span style="color: #ec6459">隐藏</span>');
                            button.replaceWith('<button name="enable_label" class="btn btn-sm btn-info">开启</button>');
                        }
                    }else{
                        alert(jsonResult.message);
                    }
                }
            });
        });

        $(document).on('click', "button[name='enable_label']", function () {
            if(!confirm('确认要开启该标签？')) {
                return;
            }

            var type = 'enable';
            var id = $(this).parent().find("input[name='id']").val();
            var button = $(this);

            $.ajax({
                type: 'GET',
                url: "{{url('/admin/label/edit')}}/"+type+"/"+id,
                dataType: 'json',
                beforeSend:function(XMLHttpRequest){
                    $("#loading").html("处理中...");
                },
                success: function(jsonResult){
                    $("#loading").empty();
                    if(jsonResult.error == 0){
                        if(!alert(jsonResult.message)) {
                            button.parent().prev().html('<span style="color: #6dbb4a">正常</span>');
                            button.replaceWith('<button name="disable_label" class="btn btn-sm btn-info">隐藏</button>');
                        }
                    }else{
                        alert(jsonResult.message);
                    }
                }
            });
        });
    </script>
@endsection