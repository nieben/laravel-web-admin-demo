@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="panel-body">
                    <form method="get" class="form-inline" id="search_posts_form" action="{{url('/admin/post/list')}}">
                        <div class="form-group" style="width: 20%">
                            <label for="">标题</label>
                            <input class="form-control" name="title"
                                   @if(isset($searchParams['title']))
                                   value="{{$searchParams['title']}}"
                                   @endif type="text"/>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group" style="width: 20%">
                            <label for="">作者</label>
                            <input class="form-control" name="user"
                                   @if(isset($searchParams['user']))
                                   value="{{$searchParams['user']}}"
                                   @endif type="text"/>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group" style="width: 15%">
                            <label for="">分类</label>
                            <select class="form-control" id="section_id" name="section_id">
                                <option value="">全部</option>
                                @foreach ($forumSections as $key => $row)
                                    <option value="1_{{$row['section']['id']}}"
                                            @if(isset($searchParams['sectionId']) AND "1_".$row['section']['id'] == $searchParams['sectionId'])
                                            selected
                                            @endif>----------{{$row['section']['name']}}----------</option>
                                    @foreach ($row['subSections'] as $sKey => $sRow)
                                        <option value="2_{{$sRow['id']}}"
                                                @if(isset($searchParams['sectionId']) AND "2_".$sRow['id'] == $searchParams['sectionId'])
                                                selected
                                                @endif>{{$sRow['name']}}</option>

                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                            <label for=""></label>
                            <button class="btn btn-danger form-control" type="submit" id="search_posts">搜索</button>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                            <label for=""></label>
                            <a href="{{url('/admin/post/list')}}"><button class="btn btn-danger form-control" type="button">清空条件</button></a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12" id="product_list">
                    <section class="panel">
                        <header class="panel-heading">
                            帖子列表
                            </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th width="12%">编号</th>
                                <th width="12%">标题</th>
                                <th width="12%">版块</th>
                                <th width="16%">作者</th>
                                <th width="12%">回复</th>
                                <th width="12%">浏览</th>
                                <th width="12%">最后发表</th>
                                <th width="12%">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($posts as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->sub_section_name}}</td>
                                    <td>{{$row->nickname}}</td>
                                    <td>{{$row->comment_number}}</td>
                                    <td>{{$row->click_number}}</td>
                                    <td>{{$row->last_response}}</td>
                                    <td>
                                        <a title="详情" href="{{url('admin/post/edit/'.$row->id)}}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="text-center">{{ $posts->appends($searchParams)->links() }}</div>
                        @if($posts->hasMorePages())
                            <div class="text-center" style="margin-top: -15px;">
                                <span style="vertical-align: center">共 <span style="font-weight: bold">{{$posts->total()}}</span> 条记录</span>
                            </div>
                        @else
                            <div class="text-center">
                                <span style="vertical-align: center">共 <span style="font-weight: bold">{{$posts->total()}}</span> 条记录</span>
                            </div>
                        @endif
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>

@endsection