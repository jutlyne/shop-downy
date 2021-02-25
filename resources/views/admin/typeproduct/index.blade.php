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
          <h4 class="card-title ">Product Types</h4>
          <ul class="nav nav-tabs" data-tabs="tabs">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.typeproduct.add')}}">
                <i class="material-icons">post_add</i>Add Another Type Product
                <div class="ripple-container"></div>
              </a>
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
                    Type Product
                  </th>
                  <th>
                    Description Product
                  </th>
                  <th>
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($listtypeproduct as $listtype)
                   @php
                       $type_id = $listtype->id_type_product;
                       $name = $listtype->name_type_product;
                       $des = Str::limit($listtype->des_type,300);
                       $stt = $listtype->status;
                   @endphp
                <tr>
                  <td>{{$type_id}}</td>
                  <td>{{$name}}</td>
                  <td>{{$des}}</td>
                  <td class="text-primary">
                    <!-- @if(!$isAdmin) disabled @endif -->
                    <a href="{{route('admin.typeproduct.edit', $listtype->id_type_product)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
                    <!-- <a href="javascript:void(0)" data-id="{{$listtype->id_type_product}}" title="" class="btn btn-danger @if(!$isAdmin) disabled @endif btn-change-type-js"><i class="fa fa-eye"></i> Hide</a> -->
                    <a href="javascript:void(0)" onclick="return hidenpage(this, {{$listtype->id_type_product}},{{$listtype->status}})" class="btn btn-danger" @if(!$isAdmin) disabled @endif title="Delete">
                      @if($stt == 1)
                        <i class='fa fa-eye'></i> Hide
                      @else
                        <i class='fa fa-eye-slash'></i> Show
                      @endif
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                        <ul class="pagination">
                            {{ $listtypeproduct->links() }}
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
function hidenpage(object, id,prc){
      eye = $(object);
      $.ajax({
      url: "typeproduct/change/"+id,
      type: 'get',
      cache: false,
      data: {id:id,prc:prc},//trong data name:value1,name2:value2
      success: function(data){
        $(eye).html(data.eyes);
      },
      error: function (){
        alert('Có lỗi xảy ra');
      }
    });
    return false;


}
</script>
@endsection
