@extends('admin.layouts.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            用户
                            <a href="{{url('/admin/user/list')}}"><button style="float: right;margin-right: 10px" class="btn btn-sm btn-info">返回列表</button></a>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered product-table">
                                <tbody>
                                <tr>
                                    <td width="12%" rowspan="2">
                                        <img src="
                                        @if ($user->avatar != null)
                                        {{$user->avatar}}
                                        @else
                                        {{$defaultAvatar}}
                                        @endif
                                                " style="width: 50px;height: 50px;border-radius:50%; overflow:hidden;" alt=""/>
                                    </td>
                                    <th width="16%">昵称：</th>
                                    <td width="28%">{{$user->nickname}}</td>
                                    <th width="16%">手机号：</th>
                                    <td width="28%">{{$user->mobile}}</td>
                                </tr>
                                <tr>
                                    <th>用户类型：</th>
                                    <td>
                                        @if($user->role == 0)
                                            普通用户
                                        @elseif($user->role == 1)
                                            医生(未认证)
                                        @elseif($user->role == 2)
                                            医生(已认证)
                                        @elseif($user->role == 3)
                                            管理员
                                        @endif
                                    </td>
                                    <th>注册时间：</th>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <header class="panel-heading">
                            基本信息
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered product-table">
                                <tbody>
                                <tr>
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>所在医院</td>
                                    <th>所属科室</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{$user->real_name}}
                                    </td>
                                    <td>
                                        @if($user->sex == 'F')
                                            女
                                        @elseif($user->sex == 'M')
                                            男
                                        @endif
                                    </td>
                                    <td>{{$user->hospital}}</td>
                                    <td>{{$user->department}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>

@endsection