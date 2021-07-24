<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Adminca bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset("assets/vendors/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/fontawesome/css/all.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/line-awesome/css/line-awesome.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/themify-icons/css/themify-icons.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/animate.css/animate.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/toastr/toastr.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css")}}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{asset("assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css")}}" rel="stylesheet" />

    <!-- THEME STYLES-->
    <link href="{{asset("assets/css/main.min.css")}}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    @hasSection("css-links")
        @yield("css-links")
    @endif
</head>
