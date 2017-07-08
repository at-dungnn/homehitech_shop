@extends('backend.main')
@section('content')
<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none">Thêm tài khoản mới</h3> </div>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <div class="panel-body">
                @if(Auth::user()->id=='1')
                	<form role="form" class="form-horizontal" method="POST" action="" >
                	{{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                            	Họ và tên
                            	<span class="required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="fullname" class="fullname form-control" value="{{old('fullname')}}"> 
                                @if ($errors->has('fullname'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Email
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="email form-control" value="{{old('email')}}"> 
                                @if ($errors->has('email'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Mật khẩu
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="password" class="password form-control"> 
                                @if ($errors->has('password'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button type="submmit" class="btn btn-primary btn-save">Thêm</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="not-access">Bạn không có quyền tạo tại khoản mới, <a href="{{route('admin.users')}}">quay lại</a>!</div>
                    @endif
                </div>
            </section>
        </div>
    </div>
</section>
@endsection