<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="#">
    <title>{{ config('app.name', '管理后台') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('/css/owl.carousel.css')}}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="{{asset('/js/html5shiv.js')}}"></script>
      <script src="{{asset('/js/respond.min.js')}}"></script>
    <![endif]-->

      @yield('js')

      <!-- Scripts -->
      <script>
          window.Laravel = <?php echo json_encode([
                  'csrfToken' => csrf_token(),
          ]); ?>
      </script>
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      @include('admin.layouts.header')
      <!--header end-->
      <!--sidebar start-->
      @include('admin.layouts.aside')
      <!--sidebar end-->
      <!--main content start-->
      @yield('content')

      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/owl.carousel.js')}}" ></script>
    <script src="{{asset('/js/jquery.customSelect.min.js')}}" ></script>

    <script src="{{asset('/js/jquery.zclip.min.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{asset('/js/common-scripts.js')}}"></script>

    <!--script for this page-->

  <script>
      //owl carousel
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
  </script>

  @yield('javascript')

  </body>
</html>
