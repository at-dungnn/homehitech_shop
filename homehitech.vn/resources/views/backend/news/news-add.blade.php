@extends('backend.main')
@section('css')
<style>
    
</style>
@endsection
@section('content')
<section class="vbox">
    <section class="scrollable padder">
        <div class="m-b-md">
            <h3 class="m-b-none">Thêm tin tức mới</h3> </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel panel-default">
                    <div class="panel-body">
                    	<form role="form" class="form-news form-horizontal" method="POST" action="{{route('admin.news.add')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                	Tiêu đề
                                	<span class="required">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" class="title form-control" maxlength="255" value="{{old('title')}}"> 
                                    @if ($errors->has('title'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </div>
                                    @endif
                                </div>                               
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Danh mục
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-4">
                                    <select name="category_id" class="category_id form-control">
                                    <option></option>
                                    @foreach($category as $key=>$val)
                                       <option value="{{$val->id}}">{{$val->name}}</option> 
                                    @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Nội dung ngắn
                                    <span class="required">*</span>
                                </label>

                                <div class="col-sm-8">
                                    <textarea name="intro" id="intro" class="intro form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hình ảnh</label>
                                <div class="col-sm-4">
                                    <input type="file" style="display: none" name="img_path" class="img_path form-control">                                    
                                    <img src="http://twodaftyanks.com/wp-content/uploads/2015/08/preview-14.png" class="preview-img" width="200px" height="200px">
                                    <button type="button" class="btn btn-primary btn-upload">Upload...</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Nội dung
                                    <span class="required">*</span>
                                </label>

                                <div class="col-sm-8">
                                    <input type="hidden" name="content" class="content" />
                                    <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                                        <div class="btn-group"> <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                            <ul class="dropdown-menu"> </ul>
                                        </div>
                                        <div class="btn-group"> <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a data-edit="fontSize 5">
                                                        <font size="5">Huge</font>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-edit="fontSize 3">
                                                        <font size="3">Normal</font>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-edit="fontSize 1">
                                                        <font size="1">Small</font>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group"> <a class="btn btn-default btn-sm" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a> <a class="btn btn-default btn-sm" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a> <a class="btn btn-default btn-sm" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a> <a class="btn btn-default btn-sm" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a> </div>
                                        <div class="btn-group"> <a class="btn btn-default btn-sm" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a> <a class="btn btn-default btn-sm" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a> <a class="btn btn-default btn-sm" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a> <a class="btn btn-default btn-sm" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a> </div>
                                        <div class="btn-group"> <a class="btn btn-default btn-sm" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a> <a class="btn btn-default btn-sm" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a> <a class="btn btn-default btn-sm" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a> <a class="btn btn-default btn-sm" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a> </div>
                                        <div class="btn-group"> <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="input-group m-l-xs m-r-xs">
                                                    <input class="form-control input-sm" placeholder="URL" type="text" data-edit="createLink" />
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default btn-sm" type="button">Add</button>
                                                    </div>
                                                </div>
                                            </div> <a class="btn btn-default btn-sm" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a> </div>
                                        <div class="btn-group hide"> <a class="btn btn-default btn-sm" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" /> </div>
                                        <div class="btn-group"> <a class="btn btn-default btn-sm" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a> <a class="btn btn-default btn-sm" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a> </div>
                                    </div>
                                    <div id="editor" class="editor_content form-control" style="overflow:scroll;height:350px;max-height:300px;width: 635px;max-width: 635px;">{{old('content')}}</div>
                                    @if ($errors->has('content'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
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
            $(".content").val($("#editor").html());
            $(".form-news").submit();   		
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