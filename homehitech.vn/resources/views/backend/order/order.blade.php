@extends('backend.main')
@section('css')
<link rel="stylesheet" href="{{asset('backend/js/datatables/datatables.css')}}" type="text/css" />
@endsection
@section('content')
<section class="vbox">
    <section class="scrollable padder">
    	<br>
        <section class="panel panel-default">
            @if (Session::has('status'))            
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="order">
                    <thead>
                        <tr>
                            <th width="10%">Mã đơn hàng</th>
                            <th width="40%">Nội dung</th>
                            <th width="40%">Khách hàng</th>
                            <th width="10%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                     </tbody>
                </table>
            </div>
        </section>
    </section>
</section>
@endsection
@section('script')
<script src="{{asset('backend/js/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
$('#order').dataTable();
// $('#order').dataTable( {
//       "ajax": "{{route('admin.category.list')}}",
//       "bProcessing": true,
//       "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
//       "aoColumns": [
//         { "data": "id",
//         render:function(data){
//             return "<a href='category/edit/"+data+"' title='Edit'><i class='fa  fa-pencil'></i></a>";
//         }},
//         { "data": "name"},
//         { "data": "id",
//         render:function(data){
//             return "<span class='delete-category' data-id='"+data+"' title='Delete'><i class='glyphicon glyphicon-remove'></i></span>";
//         }}
//       ]
// });
$(document).on("click",".delete-category",function(){
    var id= $(this).attr('data-id');
    var _this=this;
    if(confirm("Bạn chắc chắn muốn xóa danh mục này không?")){
        $.ajax({
            url:'{{route('admin.category.delete')}}',
            data:{id:id},
            dataType:'json',
            type:'post',
            success: function(res){
                if(res.status=='ok'){
                    $(_this).closest('tr').remove();
                    showNotification("Xóa danh mục thành công!","danger");
                }else{
                    alert('Delete Fail');
                }
            }
        })
    }
});
</script>
@endsection