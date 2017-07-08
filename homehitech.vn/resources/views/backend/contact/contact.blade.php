@extends('backend.main')
@section('content')
	<section class="scrollable padder">
    <br>
        <section class="panel panel-default">
        	<div class="panel-body">
	        	@if (Session::has('status'))            
		            <div class="alert alert-success alert-dismissable">
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                {{ Session::get('status') }}
		            </div>
		        @endif
                <div class="row wrapper">
                    <div class="col-md-12">
                        <form role="form" class="form-product form-horizontal" method="POST" action="{{route('admin.contact')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Địa chỉ
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="address" class="address form-control" value="{{$contact->address}}" maxlength="255">
                                    @if ($errors->has('address'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
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
                                    <input type="text" name="email" class="email form-control" value="{{$contact->email}}">
                                    @if ($errors->has('email'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Số điện thoại cá nhân
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone_canhan" class="phone_canhan form-control" maxlength="20" value="{{$contact->phone_canhan}}">
                                    @if ($errors->has('phone_canhan'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('phone_canhan') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Số điện thoại công ty
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone_congty" class="phone_congty form-control" maxlength="20" value="{{$contact->phone_congty}}">
                                    @if ($errors->has('phone_congty'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('phone_congty') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Skype
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="skype" class="skype form-control" maxlength="200" value="{{$contact->skype}}">
                                    @if ($errors->has('skype'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('skype') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Facebook
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="facebook" class="facebook form-control" maxlength="200" value="{{$contact->facebook}}">
                                    @if ($errors->has('facebook'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button type="submmit" class="btn btn-primary btn-save">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        	</div>  
        </section>
        </div>
    </div>
    </section>
@endsection
@section('script')
@endsection