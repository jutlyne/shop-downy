@extends('template.admin.master')
@section('main-content-admin')
@if(Session::has('msg'))
<script type="text/javascript">
alert('{{Session::get('msg')}}')
</script>
@endif
<div class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Products</h4>
          <ul class="nav nav-tabs" data-tabs="tabs">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.product.add')}}">
                <i class="material-icons">post_add</i>Add Another Product
                <div class="ripple-container"></div>
              </a>
            </li>
            <li class="justify-content-end navbar-collapse">
              <form class="navbar-form">
                <div class="input-group no-border">
                  <input type="text" value="" id="searchp" class="form-control" placeholder="Search...">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <tr>
                  <th>
                    ID
                  </th>
                  <th>
                    Product Name
                  </th>
                  <th>
                    Product Type
                  </th>
                  <th>
                    Discount
                  </th>
                  <th>
                    Price
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Picture
                  </th>
                  <th>
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody id="product">
                @foreach ($listproduct as $listproducts)
                  @php
                    $id = $listproducts->id_product;
                    $name = $listproducts->name_product;
                    $type = $listproducts->tname;
                    $pic = $listproducts->picture_product;
                    $des = Str::limit($listproducts->des_product,300);
                    $uname = $listproducts->uname;
                    $discount = $listproducts->discount;
                    $price = $listproducts->price_product;
                    $Urlpic = 'http://localhost/shop/storage/app/'.$pic;
                  @endphp
                <tr>
                  <td>{{$id}}</td>
                  <td>{{$name}}</td>
                  <td>{{$type}}</td>
                  <td>{{$discount}}</td>
                  <td>{{$price}}</td>
                  <td style="height: 100px; word-wrap: break-word;">{!!$des!!}</td>
                  <td>
                    <img src="{{$Urlpic}}" alt="" height="80px" width="100px">
                  </td>
                  <td class="text-primary">
                    <a href="{{route('admin.product.edit', $listproducts->id_product)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
                    <a href="javascript:void(0)" data-id="{{$listproducts->id_product}}" title="" class="btn btn-danger btn-remove-room-js" data-token="{{ csrf_token() }}"><i class="fa fa-pencil"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                        <ul class="pagination">
                            {{ $listproduct->links() }}
                        </ul>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).ready(function() {
  $(".btn-remove-room-js").click(function() {
    self = $(this);
    id = self.data('id');
    tr = self.parents('tr');
    $.ajax({
      url: "product/delete/"+id,
      type: 'get',
      cache: false,
      data: {"id":id},
      success: function(data){
        tr.remove();
        alertify.success('Success');
      }
    });
  });
})
$(document).ready(function(){
  $("#searchp").keyup(function(){
    key = $(this).val();
    $.ajax({
      url: "product/search/"+key,
      type: 'get',
      cache: false,
      data: {
        'key': key
      },
      success: function(data){
        document.getElementById('product').innerHTML = data.output;
        //$('.product').html(data.output);
      }
    });
  })
})
</script>

@stop
