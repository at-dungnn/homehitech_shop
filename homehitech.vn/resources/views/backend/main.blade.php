<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <meta charset="utf-8" />
    <title>Administrator HomeHiTech</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{asset('backend/css/app.v1.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('backend/js/calendar/bootstrap_calendar.css')}}" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
    @yield('css')
    <style>
        .required{
            color:red;
        }
        .glyphicon {
            cursor: pointer;
        }
        .glyphicon-remove{
            color:red;
        }
        .help-block{
            color:red;
        }
        [data-notify="progressbar"] {
            margin-bottom: 0px;
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 100%;
            height: 5px;
        }
    </style>
</head>
<body class="">
    <section class="vbox">
        <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
            <div class="navbar-header aside-md dk">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                <a href="index-2.html" class="navbar-brand"> <img src="{{asset('images/logo.png')}}" class="m-r-sm" alt="scale"> <span class="hidden-nav-xs">HomeHiTech</span> </a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a>
            </div>
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="{{asset('backend/images/a0.png')}}" alt="..."> </span> {{Auth::user()->name}} <b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li><a href="{{route('admin.users')}}">Thay đổi mật khẩu</a></li>
                        <li> 
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
                    <section class="vbox">
                        <section class="w-f scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                <div class="clearfix wrapper dk nav-user hidden-xs">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="{{asset('backend/images/a0.png')}}" class="dker" alt="..."> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt">{{Auth::user()->name}}</strong> <b class="caret"></b> </span> <span class="text-muted text-xs block">Administrator</span> </span>
                                        </a>
                                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                            <li><a href="{{route('admin.users')}}">Thay đổi mật khẩu</a></li>
                                            <li> <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- nav -->
                                <nav class="nav-primary hidden-xs">
                                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                                    <ul class="nav nav-main" data-ride="collapse">
                                        <li class="{{$isActive=='overview'?'active':''}}">
                                            <a href="{{route('admin')}}" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Tổng Quát</span> </a>
                                        </li>
                                        <li class="{{$isActive=='banner'?'active':''}}">
                                            <a href="{{route('admin.banner')}}" class="auto">   <i class="fa  fa-sliders icon"> </i> <span class="font-bold">Banner</span> </a>
                                        </li> 
                                        <li class="{{$isActive=='news'?'active':''}}">
                                            <a href="{{route('admin.news')}}" class="auto">   <i class="fa fa-file-text icon"> </i> <span class="font-bold">Tin Tức</span> </a>
                                        </li>  
                                        <li class="{{$isActive=='product'?'active':''}}">
                                            <a href="{{route('admin.product')}}" class="auto">   <i class="fa fa-bars icon"> </i> <span class="font-bold">Sản Phẩm</span> </a>
                                        </li>  
                                        <li class="{{$isActive=='category'?'active':''}}">
                                            <a href="{{route('admin.category')}}" class="auto">   <i class="i i-stack icon"> </i> <span class="font-bold">Danh Mục</span> </a>
                                        </li>
                                        <li class="{{$isActive=='order'?'active':''}}">
                                            <a href="{{route('admin.order')}}" class="auto">   <i class="fa  fa-shopping-cart icon"> </i> <span class="font-bold">Đặt Hàng</span> </a>
                                        </li>
                                        <li class="{{$isActive=='users'?'active':''}}">
                                            <a href="#" class="auto"> <i class="fa  fa-user icon"> </i> <span class="font-bold">Tài Khoản</span> </a>
                                            <ul class="nav dk">
                                                <li class="{{(isset($isActiveSub) && $isActiveSub=='update')?'active':''}}">
                                                    <a href="{{route('admin.users')}}" class="auto"> <i class="i i-dot"></i> <span>Cập nhật tài khoản</span> </a>
                                                </li>
                                                @if(Auth::user()->id=='1')
                                                <li class="{{(isset($isActiveSub) && $isActiveSub=='list')?'active':''}}">
                                                    <a href="{{route('admin.users.list-all')}}" class="auto"> <i class="i i-dot"></i> <span>Danh sách</span> </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </li>                                        
                                        <li class="{{$isActive=='cskh'?'active':''}}">
                                            <a href="{{route('admin.cskh')}}" class="auto"> <i class="glyphicon  glyphicon-headphones icon"> </i> <span class="font-bold">Nhân Viên CSKH</span> </a>
                                        </li>
                                        <li class="{{$isActive=='contact'?'active':''}}">
                                            <a href="{{route('admin.contact')}}" class="auto"> <i class="glyphicon glyphicon-phone-alt icon"> </i> <span class="font-bold">Liên Hệ</span> </a>
                                        </li>
                                    </ul>
                                    
                                </nav>
                                <!-- / nav -->
                            </div>
                        </section>
                        <footer class="footer hidden-xs no-padder text-center-nav-xs">
                            
                            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a>
                        </footer>
                    </section>
                </aside>
                <!-- /.aside -->
                <section id="content">
                    @yield('content')
                </section>
            </section>
        </section>
    </section>
    
    <!-- Bootstrap -->
    <!-- App -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/app.v1.js')}}"></script>
    <script src="{{asset('backend/js/charts/easypiechart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('backend/js/charts/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('backend/js/charts/flot/jquery.flot.min.js')}}"></script>
    <script src="{{asset('backend/js/charts/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('backend/js/charts/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('backend/js/charts/flot/jquery.flot.pie.min.js')}}"></script>
    <script src="{{asset('backend/js/charts/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('backend/js/charts/flot/jquery.flot.grow.js')}}"></script>
    <script src="{{asset('backend/js/charts/flot/demo.js')}}"></script>
    <script src="{{asset('backend/js/calendar/bootstrap_calendar.js')}}"></script>
    <script src="{{asset('backend/js/calendar/demo.js')}}"></script>
    <script src="{{asset('backend/js/sortable/jquery.sortable.js')}}"></script>
    <script src="{{asset('backend/js/app.plugin.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap-notify-master/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript">
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function showNotification(msg,type){           
            $.notify({
                // options
                icon: 'fa fa-bell',
                message: msg
            },{
                // settings
                element: 'body',
                position: null,
                type: type,
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
            });
        }
    });
    </script>
    @yield('script')

</body>

</html>
