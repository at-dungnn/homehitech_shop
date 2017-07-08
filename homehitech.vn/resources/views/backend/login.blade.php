<!DOCTYPE html>
<html lang="en" class=" ">
<!-- Mirrored from flatfull.com/themes/scale/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Jun 2017 15:28:37 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Login administrator</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{asset('backend/css/app.v1.css')}}" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index-2.html">Homehitech Admin</a>
            <section class="m-b-lg">
                <form action="{{ route('login') }}" role="form" method="POST">
                    {{ csrf_field() }}
                    <div class="list-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="list-group-item">
                            <input type="email" placeholder="Email" name="email" class="form-control no-border" value="{{ old('email') }}" required autofocus> 
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>                        
                        <div class="list-group-item {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" placeholder="Password" name="password" class="form-control no-border">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                                                    
                        <div class="list-group-item">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                </form>
                    <div class="text-center m-t m-b"><a href="{{ route('admin.reset') }}"><small>Forgot password?</small></a></div>
                    <div class="line line-dashed"></div>
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p> <small>by HomeHiTech<br>&copy; 2017</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="{{asset('backend/js/app.v1.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/app.plugin.js')}}"></script>

</body>
</html>
