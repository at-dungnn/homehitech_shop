@extends('backend.main')
@section('css')
<link rel="stylesheet" href="{{asset('backend/js/datatables/datatables.css')}}" type="text/css" />
@endsection
@section('content')
<section class="vbox">
    <section class="scrollable padder">
    	<br>
        <div class="m-b-md">
	      <a href="{{route('admin.product.add')}}" class="btn btn-s-md btn-primary m-b-none"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
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
                            <th width="20%">Tên sản phẩm</th>
                            <th width="15%">Mã sản phẩm</th>
                            <th width="15%">Giá</th>
                            <th width="15%">Danh Mục</th>
                            <th width="15%">Người tạo</th>
                            <th width="15%">Ngày tạo</th>
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
    "ajax": "{{route('admin.product.list')}}",
      "bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      // "sPaginationType": "full_numbers",
      "aoColumns": [
        { "data": "id",
        render : function(data){
            return "<a href='product/edit/"+data+"' title='Edit'><i class='fa  fa-pencil'></i></a>";
        }},
        { "data": "ten_sanpham"},
        { "data": "ma_sanpham" },
        { "data": "gia",
        render : function(data){
            return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+" VNĐ";
        }},
        { "data": "category" },
        { "data": "created_by" },
        { "data": "created_at",
        render : function(data){
            return data.substr(0, 10);
        }},
        { "data": "id",
        render:function(data){
            return "<span class='delete-product' data-id='"+data+"' title='Delete'><i class='glyphicon glyphicon-remove'></i></span>";
        }},
      ]
});
$(document).on("click",".delete-product",function(){
    var id= $(this).attr('data-id');
    var _this=this;
    if(confirm("Bạn chắc chắn muốn xóa sản phẩm này không?")){
        $.ajax({
            url:'{{route('admin.product.delete')}}',
            data:{id:id},
            dataType:'json',
            type:'post',
            success: function(res){
                if(res.status=='ok'){
                    $(_this).closest('tr').remove();
                    showNotification("Xóa sản phẩm thành công!","danger");
                }else{
                    alert('Delete Fail');
                }
            }
        })
    }
});

</script>
@endsection