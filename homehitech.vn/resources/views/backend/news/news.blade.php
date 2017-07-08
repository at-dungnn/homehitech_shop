@extends('backend.main')
@section('css')
<link rel="stylesheet" href="{{asset('backend/js/datatables/datatables.css')}}" type="text/css" />
@endsection
@section('content')
<section class="vbox">
    <section class="scrollable padder">
    	<br>
        <div class="m-b-md">
	      <a href="{{route('admin.news.add')}}" class="btn btn-s-md btn-primary m-b-none"><i class="fa fa-plus"></i> Thêm tin tức</a>
        </div>
        <section class="panel panel-default">
        @if (Session::has('status'))            
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('status') }}
            </div>
        @endif
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="product">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="25%">Tiêu đề</th>
                            <th width="15%">Danh Mục</th>
                            <th width="15%">Người tạo</th>
                            <th width="15%">Ngày tạo</th>
                            <th width="15%">Ngày cập nhật</th>
                            <th width="5%">Delete</th>
                        </tr>
                    </thead>
                    <tbody> </tbody>
                </table>
            </div>
        </section>
    </section>
</section>
@endsection
@section('script')
<script src="{{asset('backend/js/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
$('#product').dataTable( {
    "ajax": "{{route('admin.news.list')}}",
      "bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers",
      "aoColumns": [
        { "data": "id",
        render : function(data){
            return "<a href='news/edit/"+data+"' title='Edit'><i class='fa  fa-pencil'></i></a>";
        }},
        { "data": "title"},
        { "data": "category" },
        { "data": "created_by" },
        { "data": "created_at",
        render : function(data){
            return data.substr(0, 10);
        }},
        { "data": "updated_at",
        render : function(data){
            return data.substr(0, 10);
        }},
        { "data": "id",
        render:function(data){
            return "<span class='delete-news' data-id='"+data+"' title='Delete'><i class='glyphicon glyphicon-remove'></i></span>";
        }},
      ]
});
$(document).on("click",".delete-news",function(){
    var id= $(this).attr('data-id');
    var _this=this;
    if(confirm("Bạn chắc chắn muốn tin tức này không?")){
        $.ajax({
            url:'{{route('admin.news.delete')}}',
            data:{id:id},
            dataType:'json',
            type:'post',
            success: function(res){
                if(res.status=='ok'){
                    $(_this).closest('tr').remove();
                    showNotification("Xóa tin tức thành công!","success");
                }else{
                    alert('Delete Fail');
                }
            }
        })
    }
});

</script>
@endsection