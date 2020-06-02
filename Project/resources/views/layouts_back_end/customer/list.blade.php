@extends('layouts_back_end.admin');

@section('content')
<div class="col-md-12" style="margin-top:50px;">
    <div class="breadcrumb-holder">
        <div class="row mb-3 mt-3">
            <div class="col-md-10 col-sm-10 col-9 text-dark px-0">
                <h1><i class="fa fa-fw fa-circle"></i> Quản lý khách hàng</h1>
            </div>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <input type="text" id="itemName" class="form-control" placeholder="Nhập tên hoặc số điện thoại khách hàng" />
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <input type="text" id="fromDateItem" class="form-control relative-icon-calendar date" placeholder="Từ ngày" />
        <i class="fa fa-calendar absolute-icon-calendar"></i>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <input type="text" id="toDateItem" class="form-control relative-icon-calendar date" placeholder="Đến ngày" />
        <i class="fa fa-calendar absolute-icon-calendar"></i>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
      <button class="btn btn-success" id="btnSearchItem" onclick="searchItem()" ><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
    </div>
</div>

<div class="row mt-5" style="margin-top:20px;">
  <div class="col-md-12">
    <table class="table table-bordered">
              <thead>
              <tr>
                <th>STT</th>
                <th>Họ và Tên</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Hành Động</th>
              </tr>
              </thead>
              <tbody>
                @foreach($lsCustomer as $customer)
                <tr>
                  <td>{{$customer->cus_id}}</td>
                  <td>{{$customer->cus_name}}</td>
                  <td>{{$customer->cus_email}}</td>
                  <td>{{$customer->cus_phone}}</td>
                  <td>{{$customer->cus_addres}}</td>
                  <td class="text-center">
                    <a><i class="fa fa-edit text-success"></i></a>
                  <a><i class="fa fa-trash text-danger" onclick="delCus({{$customer->cus_id}})"></i></a>
                </td>
                  <!-- <td class="form-group">
                    <a href="{{route('customer_manage.edit', $customer->cus_id)}}" class="button">Edit</a></i></a>
                    <form class="" action="{{route('customer_manage.destroy', $customer->cus_id)}}"
                      method="POST" onsubmit="return ConfirmDelete()">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="submit" name=""  value="Delete">
                    </form>
                  </td> -->
                </tr>
                @endforeach
              </tbody>
            </table>
  </div>
</div>

{{$lsCustomer->links()}}

<script type="text/javascript">
    // function ConfirmDelete() {
    //     return confirm("Are you sure you want to delete?");
    // }

    //Xóa khách hàng
    function delCus(id) {
      swal({
        title:"Bạn chắc chắn muốn xóa chứ?",
        text:"",
        icon:"warning",
        buttons:['Cancel','OK']
      }).then((sure)=>{
        if(sure){
          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"customer_manage/destroy",
            data:{id},
            type:"delete",
            success:function(res){
              if(res.status == 1){
                swal({
                  title:res.message,
                  text:"",
                  icon:"success"
                }).then((success) =>{
                  if(success){
                    location.reload();
                  }
                })
              }
              else {
                swal({
                  title:res.message,
                  text:"",
                  icon:"error",
                })
              }
            }
          })
        }
      })
    }
</script>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>

@endsection
