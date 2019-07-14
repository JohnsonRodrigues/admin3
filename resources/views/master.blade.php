<!DOCTYPE html>
<!--[if IE 8]>
<html lang="pt-br" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="pt-br" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('title', config('metronic3.title', 'Metronic3'))</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
{{--<meta content="Preview page of Metronic3 Admin Theme #1 for blank page layout" name="description"/>--}}
{{--<meta content="" name="author"/>--}}

<!-- BEGIN PAGE FIRST SCRIPTS -->
    <script src="{{asset('vendor/metronic3/global/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE FIRST SCRIPTS -->
    <!-- BEGIN PAGE TOP STYLES -->
    <link href="{{asset('vendor/metronic3/global/plugins/pace/themes/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE TOP STYLES -->

<!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('vendor/metronic3/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('vendor/metronic3/global/plugins/simple-line-icons/simple-line-icons.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('vendor/metronic3/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('vendor/metronic3/global/css/'.config('metronic3.theme_style', 'components-square').'.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('vendor/metronic3/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->


    @yield('metronic3_css')


    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->


<body class="@yield('body_class')">

@yield('body')






<!--[if lt IE 9]>
<script src="{{asset('vendor/metronic3/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('vendor/metronic3/global/plugins/excanvas.min.js')}}"></script>
<script src="{{asset('vendor/metronic3/global/plugins/ie8.fix.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('vendor/metronic3/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/metronic3/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/metronic3/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('vendor/metronic3/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('vendor/metronic3/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->


@yield('metronic3_js')

</body>
</html>
