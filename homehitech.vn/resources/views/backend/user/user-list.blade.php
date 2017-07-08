@extends('backend.main')
@section('css')
<link rel="stylesheet" href="{{asset('backend/js/datatables/datatables.css')}}" type="text/css" />
@endsection
@section('content')
	<section class="scrollable padder">
	<br>
    <div class="m-b-md">
      <a href="{{route('admin.users.add')}}" class="btn btn-s-md btn-primary m-b-none"><i class="fa fa-plus"></i> Thêm tài khoản</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <section class="panel panel-default">
            <div class="panel-body">
            @if (Session::has('status'))            
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('status') }}
                </div>
            @endif
            @if(Auth::user()->id=="1")
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light" data-ride="datatables" id="users">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="25%">Họ và tên</th>
                                <th width="25%">Email</th>
                                <th width="25%">Ngày tạo</th>
                                <th width="15%">Delete</th>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
                @endif
            </div>
        </section>
        </div>
    </div>
    </section>
@endsection
@section('script')
<script src="{{asset('backend/js/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
$('#users').dataTable( {
    "ajax": "{{route('admin.users.list')}}",
      "bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      // "sPaginationType": "full_numbers",
      "aoColumns": [
        { "data": "id"},
        { "data": "name"},
        { "data": "email"},
        { "data": "created_at",
        render : function(data){
            return data.substr(0, 10);
        }},
        { "data": "id",
        render:function(data){
            return "<span class='delete-user' data-id='"+data+"'><i class='glyphicon glyphicon-remove'></i></span>";
        }},
      ]
});
$(document).on("click",".delete-user",function(){
    var id= $(this).attr('data-id');
    var _this=this;
    if(confirm("Bạn chắc chắn muốn xóa tài khoản này không?")){
        $.ajax({
            url:'{{route('admin.users.delete')}}',
            data:{id:id},
            dataType:'json',
            type:'post',
            success: function(res){
                if(res.status=='ok'){
                    $(_this).closest('tr').remove();
                    showNotification("Xóa tài khoản thành công!","success");
                }else{
                    showNotification("Xóa tài khoản thất bại!","danger");
                }
            }
        })
    }
});
</script>
@endsection