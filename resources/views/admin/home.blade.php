@extends('admin.layouts.app')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!--state 全览 start-->
            <div class="row">
                <div class="panel-body">
                    <form class="form-inline" id="search_overview_form">
                        <div class="form-group">
                            <label for="order_status">开始时间</label>
                            <input class="form-control m-bot15" type="date" id="start_time" name="start_time" value="">
                        </div>
                        <div class="form-group">
                            <label for="order_status">结束时间</label>
                            <input class="form-control m-bot15" type="date" id="end_time" name="end_time" value="">
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-danger" type="button" id="search_overview">查询</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row state-overview" id="overview">
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="icon-user"></i>
                        </div>
                        <div class="value">
                            <h1></h1>
                            <p>新增用户</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="icon-book"></i>
                        </div>
                        <div class="value">
                            <h1></h1>
                            <p>新增帖子</p>
                        </div>
                    </section>
                </div>
            </div>
            <!--state 全览 end-->
        </section>
    </section>
@endsection