@extends('backend.main')
@section('css')
<link rel="stylesheet" href="{{asset('backend/js/datatables/datatables.css')}}" type="text/css" />
@endsection
@section('content')
<section class="vbox">
    <section class="scrollable padder">
    	<br>
        <div class="m-b-md">
	      <a href="{{route('admin.cskh.add')}}" class="btn btn-s-md btn-primary m-b-none"><i class="fa fa-plus"></i> Thêm nhân viên</a>
        </div>
        <section class="panel panel-default">
            @if (Session::has('status'))            
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="cskh">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Tên nhân viên</th>
                            <th width="15%">Số điện thoại</th>
                            <th width="15%">Email</th>
                            <th width="15%">Skype</th>
                            <th width="15%">Facebook</th>
                            <th width="5%">Xóa</th>
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
$('#cskh').dataTable( {
      "ajax": "{{route('admin.cskh.list')}}",
      "bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "aoColumns": [
        { "data": "id",
        render:function(data){
            return "<a href='cskh/edit/"+data+"' title='Edit'><i class='fa  fa-pencil'></i></a>";
        }},
        { "data": "name"},
        { "data": "phone"},
        { "data": "email"},
        { "data": "skype"},
        { "data": "facebook"},
        { "data": "id",
        render:function(data){
            return "<span class='delete-cskh' data-id='"+data+"' title='Delete'><i class='glyphicon glyphicon-remove'></i></span>";
        }}
      ]
});
$(document).on("click",".delete-cskh",function(){
    var id= $(this).attr('data-id');
    var _this=this;
    if(confirm("Bạn chắc chắn muốn xóa nhân viên CSKH này không?")){
        $.ajax({
            url:'{{route('admin.cskh.delete')}}',
            data:{id:id},
            dataType:'json',
            type:'post',
            success: function(res){
                if(res.status=='ok'){
                    $(_this).closest('tr').remove();
                    showNotification("Xóa nhân viên CSKH thành công!","success");
                }else{
                    alert('Delete Fail');
                }
            }
        })
    }
});
</script>
@endsection