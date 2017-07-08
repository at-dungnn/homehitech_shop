@extends('backend.main')
@section('content')
<section class="hbox stretch">
    <section>
        <section class="vbox">
            <section class="scrollable padder">
                <section class="row m-b-md">
                    <div class="col-sm-6">
                        <h3 class="m-b-xs text-black">Dashboard</h3> <small>Welcome back, {{Auth::user()->name}}.</small> </div>
                </section>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel b-a">
                            <div class="row m-n">
                                <div class="col-md-6 b-b b-r">
                                    <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i> <i class="fa fa-rocket text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-danger">{{$product or ''}}</span> <small class="text-muted text-u-c">Sản phẩm</small> </span>
                                    </a>
                                </div>
                                <div class="col-md-6 b-b">
                                    <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i> <i class="i i-users2 i-sm text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-success">{{$category  or ''}}</span> <small class="text-muted text-u-c">Danh mục</small> </span>
                                    </a>
                                </div>
                                 <div class="col-md-6 b-b b-r">
                                    <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i> <i class="i i-location i-sm text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-info">{{$user  or ''}} </span> <small class="text-muted text-u-c">Tài khoản</small> </span>
                                    </a>
                                </div>
                                <div class="col-md-6 b-b">
                                    <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i> <i class="fa fa-file-text text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-primary">{{$news  or ''}}</span> <small class="text-muted text-u-c">Tin tức</small> </span>
                                    </a>
                                </div> 
                                <div class="col-md-6 b-b b-r">
                                    <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i> <i class="fa fa-user text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-primary">{{$cskh  or ''}}</span> <small class="text-muted text-u-c">Nhân viên CSKH</small> </span>
                                    </a>
                                </div>
                                <div class="col-md-6 b-b">
                                    <a href="#" class="block padder-v hover"> <span class="i-s i-s-2x pull-left m-r-sm"> <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i> <i class="fa fa-shopping-cart text-white"></i> </span> <span class="clear"> <span class="h3 block m-t-xs text-primary">{{$order  or ''}}</span> <small class="text-muted text-u-c">Đơn đặt hàng</small> </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-3 col-sm-6">
                        <div class="panel b-a">
                            <div class="panel-heading no-border bg-primary lt text-center">
                                <a href="#"> <i class="fa fa-facebook fa fa-3x m-t m-b text-white"></i> </a>
                            </div>
                            <div class="padder-v text-center clearfix">
                                <div class="col-xs-6 b-r">
                                    <div class="h3 font-bold">42k</div> <small class="text-muted">Friends</small> </div>
                                <div class="col-xs-6">
                                    <div class="h3 font-bold">90</div> <small class="text-muted">Feeds</small> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="panel b-a">
                            <div class="panel-heading no-border bg-info lter text-center">
                                <a href="#"> <i class="fa fa-twitter fa fa-3x m-t m-b text-white"></i> </a>
                            </div>
                            <div class="padder-v text-center clearfix">
                                <div class="col-xs-6 b-r">
                                    <div class="h3 font-bold">27k</div> <small class="text-muted">Tweets</small> </div>
                                <div class="col-xs-6">
                                    <div class="h3 font-bold">15k</div> <small class="text-muted">Followers</small> </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </section>
        </section>
    </section>
    <!-- side content -->
    <aside class="aside-md bg-black hide" id="sidebar">
        <section class="vbox animated fadeInRight">
            <section class="scrollable">
                <div class="wrapper"><strong>Live feed</strong></div>
                <ul class="list-group no-bg no-borders auto">
                    <li class="list-group-item"> <span class="fa-stack pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-success"></i> <i class="fa fa-reply fa-stack-1x text-white"></i> </span> <span class="clear"> <a href="#">Goody@gmail.com</a> sent your email <small class="icon-muted">13 minutes ago</small> </span> </li>
                    <li class="list-group-item"> <span class="fa-stack pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-danger"></i> <i class="fa fa-file-o fa-stack-1x text-white"></i> </span> <span class="clear"> <a href="#">Mide@live.com</a> invite you to join a meeting <small class="icon-muted">20 minutes ago</small> </span> </li>
                    <li class="list-group-item"> <span class="fa-stack pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-map-marker fa-stack-1x text-white"></i> </span> <span class="clear"> <a href="#">Geoge@yahoo.com</a> is online <small class="icon-muted">1 hour ago</small> </span> </li>
                    <li class="list-group-item"> <span class="fa-stack pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-primary"></i> <i class="fa fa-info fa-stack-1x text-white"></i> </span> <span class="clear"> <a href="#"><strong>Admin</strong></a> post a info <small class="icon-muted">1 day ago</small> </span> </li>
                </ul>
                <div class="wrapper"><strong>Friends</strong></div>
                <ul class="list-group no-bg no-borders auto">
                    <li class="list-group-item">
                        <div class="media"> <span class="pull-left thumb-sm avatar"> <img src="images/a3.png" alt="..." class="img-circle"> <i class="on b-black bottom"></i> </span>
                            <div class="media-body">
                                <div><a href="#">Chris Fox</a></div> <small class="text-muted">about 2 minutes ago</small> </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media"> <span class="pull-left thumb-sm avatar"> <img src="images/a2.png" alt="..."> <i class="on b-black bottom"></i> </span>
                            <div class="media-body">
                                <div><a href="#">Amanda Conlan</a></div> <small class="text-muted">about 2 hours ago</small> </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media"> <span class="pull-left thumb-sm avatar"> <img src="images/a1.png" alt="..."> <i class="busy b-black bottom"></i> </span>
                            <div class="media-body">
                                <div><a href="#">Dan Doorack</a></div> <small class="text-muted">3 days ago</small> </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media"> <span class="pull-left thumb-sm avatar"> <img src="images/a0.png" alt="..."> <i class="away b-black bottom"></i> </span>
                            <div class="media-body">
                                <div><a href="#">Lauren Taylor</a></div> <small class="text-muted">about 2 minutes ago</small> </div>
                        </div>
                    </li>
                </ul>
            </section>
        </section>
    </aside>
    <!-- / side content -->
</section>
@endsection