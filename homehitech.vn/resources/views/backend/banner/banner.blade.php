@extends('backend.main')
@section('css')
<link rel="stylesheet" href="{{asset('backend/js/datatables/datatables.css')}}" type="text/css" />
@endsection
@section('content')
<section class="vbox">
    <section class="scrollable padder">
    	<br>
        <div class="m-b-md">
	      <a href="{{route('admin.banner.add')}}" class="btn btn-s-md btn-primary m-b-none"><i class="fa fa-plus"></i> Thêm slide</a>
        </div>
        <section class="panel panel-default">
            @if (Session::has('status'))            
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="category">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">Tiêu đề</th>
                            <th width="30%">Hình ảnh</th>
                            <th width="10%">Xóa</th>
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
$('#category').dataTable( {
      "ajax": "{{route('admin.banner.list')}}",
      "bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "aoColumns": [
        { "data": "id",
        render:function(data){
            return "<a href='banner/edit/"+data+"' title='Edit'><i class='fa  fa-pencil'></i></a>";
        }},
        { "data": "title"},
        { "data": "img_path",
        render: function(data){
            return "<img src='../upload/banner/"+data+"' with='100px' height='100px'>";
        }},
        { "data": "id",
        render:function(data){
            return "<span class='delete-banner' data-id='"+data+"' title='Delete'><i class='glyphicon glyphicon-remove'></i></span>";
        }}
      ]
});
$(document).on("click",".delete-banner",function(){
    var id= $(this).attr('data-id');
    var _this=this;
    if(confirm("Bạn chắc chắn muốn xóa slide này không?")){
        $.ajax({
            url:'{{route('admin.banner.delete')}}',
            data:{id:id},
            dataType:'json',
            type:'post',
            success: function(res){
                if(res.status=='ok'){
                    $(_this).closest('tr').remove();
                    showNotification("Xóa slide thành công!","success");
                }else{
                    alert('Delete Fail');
                }
            }
        })
    }
});
</script>
@endsection