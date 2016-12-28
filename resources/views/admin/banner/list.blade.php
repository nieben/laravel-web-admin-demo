@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12" id="product_list">
                    <section class="panel">
                        <header class="panel-heading">
                            Banner列表
                            &nbsp;&nbsp;<a href="{{url('/admin/banner/add')}}"><button class='btn btn-info btn-sm'>新增banner</button></a>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="12%">标题</th>
                                <th width="12%">文章</th>
                                <th width="12%">图片</th>
                                <th width="10%">状态</th>
                                <th width="12%">标签</th>
                                <th width="10%">排序</th>
                                <th width="12%">修改时间</th>
                                <th width="10%">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($banners as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->article_title}}</td>
                                    <td><img src="{{$row->image}}" height="60" width="80"/></td>
                                    <td>
                                        @if ($row->disabled == 0)
                                            <span style="color: #6dbb4a">显示</span>
                                        @else
                                            <span style="color: #ec6459">已隐藏</span>
                                        @endif
                                    </td>
                                    <td>{{$row->labels_zh}}</td>
                                    <td>{{$row->sort}}</td>
                                    <td>
                                        {{$row->updated_at}}
                                    </td>
                                    <td>
                                        <a title="详情" href="{{url('admin/banner/edit/'.$row->id)}}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>

@endsection