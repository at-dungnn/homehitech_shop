@extends('backend.main')
@section('css')
<style>
    
</style>
@endsection
@section('content')
<section class="vbox">
    <section class="scrollable padder">
        <div class="m-b-md">
            <h3 class="m-b-none">Thêm nhân viên CSKH mới</h3> </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" class="form-cskh form-horizontal" method="POST" action="{{route('admin.cskh.add')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Tên nhân viên
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="name form-control" maxlength="255" value="{{old('name')}}"> 
                                    @if ($errors->has('name'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div>                           
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Hình đại diện
                                <span class="required">*</span></label>
                                <div class="col-sm-4">
                                    <input type="file" style="display: none" name="img_path" class="img_path form-control">                                    
                                    <img src="http://twodaftyanks.com/wp-content/uploads/2015/08/preview-14.png" class="preview-img" width="200px" height="200px">
                                    <button type="button" class="btn btn-primary btn-upload">Upload...</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Số điện thoại
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="phone form-control" maxlength="255" value="{{old('phone')}}"> 
                                    @if ($errors->has('phone'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
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
                                    <input type="text" name="email" class="email form-control" maxlength="255" value="{{old('email')}}"> 
                                    @if ($errors->has('email'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Skype                                   
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="skype" class="skype form-control" maxlength="255" value="{{old('skype')}}"> 
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
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="facebook" class="facebook form-control" maxlength="255" value="{{old('facebook')}}"> 
                                    @if ($errors->has('facebook'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button type="button" class="btn btn-primary btn-save">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection

@section('script')
<!-- wysiwyg -->
    <script src="{{asset('backend/js/wysiwyg/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('backend/js/wysiwyg/bootstrap-wysiwyg.js')}}"></script>
    <script src="{{asset('backend/js/wysiwyg/demo.js')}}"></script>
    <script type="text/javascript">
        $(".btn-save").on("click",function(e){
            $(".form-cskh").submit();        
        });
        $(".btn-upload").on("click",function(){
            $(".img_path").trigger('click');
        });
        $(document).on("change",".img_path",function(){
            var ext = $(this).val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                alert('File không hợp lệ!');
            }else{
                readURL(this);  
            }
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();              
                reader.onload = function (e) {
                    $('.preview-img').attr('src', e.target.result);
                }               
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection