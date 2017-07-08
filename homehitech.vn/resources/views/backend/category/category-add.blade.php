@extends('backend.main')
@section('content')
<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none">Thêm danh mục mới</h3> </div>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <div class="panel-body">
                	<form role="form" class="form-horizontal" method="POST" action="" >
                	{{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Danh mục cha
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <select name="parent_id" id="parent_id" class="parent_id form-control" required="required">
                                    <option value="0">Cha</option>
                                    {!!$categoryHtml!!}
                                </select>
                                
                                @if ($errors->has('parent_id'))
                                    <div class="help-block">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                            	Tên danh mục
                            	<span class="required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="ten_danhmuc" class="ten_danhmuc form-control"> 
                                @if ($errors->has('ten_danhmuc'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('ten_danhmuc') }}</strong>
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
                </div>
            </section>
        </div>
    </div>
</section>
@endsection