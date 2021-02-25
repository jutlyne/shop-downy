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
              <h4 class="card-title ">Contact</h4>
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
                        Name
                      </th>
                      <th>
                        Phone
                      </th>
                      <th>
                        Address
                      </th>
                      <th>
                        City
                      </th>
                      <th>
                        Address Type
                      </th>
                      <th>
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order as $orders)
                      @php
                        $id = $orders->id;
                        $name = $orders->fullname;
                        $phone = $orders->phone;
                        $address = $orders->address;
                        $city = $orders->city;
                        $type = $orders->address_type;
                        $stt = $orders->status;
                      @endphp
                    <tr>
                      <td>{{$id}}</td>
                      <td>{{$name}}</td>
                      <td>{{$phone}}</td>
                      <td>{{$address}}</td>
                      <td>{{$city}}</td>
                      <td>{{$type}}</td>
                      <td class="text-primary">
                        @if($stt == 1) <a href="{{route('admin.order.show', $id)}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> delivery</a>
                        @elseif($stt == 2) <a href="javascript:void(0)" onclick="return hidenpage(this, {{$id}})" title="" class="btn"><i class="fa fa-truck"></i> Shipping</a>
                        @else <button type="button" class="btn" name="button"><i class="fa fa-check-circle"></i> SUCCESS</button>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
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
    function hidenpage(object, id){
          btn = $(object);
          $.ajax({
          url: "order/change/"+id,
          type: 'get',
          cache: false,
          data: {id:id},//trong data name:value1,name2:value2
          success: function(data){
            $(btn).html(data.btn);
          },
          error: function (){
            alert('Có lỗi xảy ra');
          }
        });
        return false;


    }
    </script>
@stop
