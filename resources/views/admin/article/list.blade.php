@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="panel-body">
                    <form method="get" class="form-inline" id="search_articles_form" action="{{url('/admin/article/list')}}">
                        <div class="form-group" style="width: 10%">
                            <label for="">分类</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">全部</option>
                                @foreach ($article_categories as $row)
                                    <option value="{{$row->id}}"
                                            @if(isset($searchParams['category_id']) AND $row->id == $searchParams['category_id'])
                                            selected
                                            @endif>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group" style="width: 20%">
                            <label for="">标题</label>
                            <input class="form-control" name="title"
                                   @if(isset($searchParams['title']))
                                   value="{{$searchParams['title']}}"
                                   @endif type="text"/>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                            <label for=""></label>
                            <button class="btn btn-danger form-control" type="submit" id="search_articles">搜索</button>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                            <label for=""></label>
                            <a href="{{url('/admin/article/list')}}"><button class="btn btn-danger form-control" type="button">清空条件</button></a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12" id="product_list">
                    <section class="panel">
                        <header class="panel-heading">
                            文章列表
                            &nbsp;&nbsp;<a href="{{url('/admin/article/add')}}"><button class='btn btn-info btn-sm'>写文章</button></a>
                            &nbsp;&nbsp;<a href="{{url('/admin/banner/list')}}"><button class='btn btn-info btn-sm'>banner管理</button></a>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th width="12%">编号</th>
                                <th width="12%">标题</th>
                                <th width="12%">分类目录</th>
                                <th width="16%">标签</th>
                                <th width="12%">点击量</th>
                                <th width="12%">评论数</th>
                                <th width="12%">时间</th>
                                <th width="12%">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($articles as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->category_name}}</td>
                                    <td>{{$row->labels_zh}}</td>
                                    <td>{{$row->click_number}}</td>
                                    <td>{{$row->comment_number}}</td>
                                    <td>
                                        @if($row->status == 0)
                                            草稿<br>{{$row->updated_at}}
                                        @elseif($row->status == 1)
                                            已发布<br>{{$row->release_time}}
                                        @endif
                                    </td>
                                    <td>
                                        <a title="详情" href="{{url('admin/article/edit/'.$row->id)}}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="text-center">{{ $articles->appends($searchParams)->links() }}</div>
                        @if($articles->hasMorePages())
                            <div class="text-center" style="margin-top: -15px;">
                                <span style="vertical-align: center">共 <span style="font-weight: bold">{{$articles->total()}}</span> 条记录</span>
                            </div>
                        @else
                            <div class="text-center">
                                <span style="vertical-align: center">共 <span style="font-weight: bold">{{$articles->total()}}</span> 条记录</span>
                            </div>
                        @endif
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>

@endsection