<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="shortcut icon" href="img/favicon.html">

    <title>{{ config('app.name', '管理后台') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('/js/html5shiv.js')}}"></script>
    <script src="{{asset('/js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
        .help-block {color:red}
    </style>
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="{{ url('/password/email') }}" method="POST">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">重置密码</h2>

        <div class="login-wrap">
            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="邮箱" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
            <button class="btn btn-lg btn-login btn-block" type="submit">发送重置链接</button>
        </div>

    </form>

</div>

</body>
</html>