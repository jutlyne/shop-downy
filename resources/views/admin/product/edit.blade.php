@extends('template.admin.master')
@section('main-content-admin')
<!-- /. ROW  -->
<div class="" style="margin: 200px 50px">
  <div class="">
    <h3 style="color: #d35400; text-align: center">Edit Product</h3>
  </div>
  <hr />
  @if(Session::has('msg'))
  <script type="text/javascript">
    alert('{{Session::get('msg')}}');
  </script>
  @endif
  <div class="row">
      <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="table-responsive">
                      <div class="row">
                        <div class="col-md-12">
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                          @php
                            $type   = $product->id_type_product;
                            $pic    = $product->picture_product;
                            $Urlpic = 'http://localhost/shop/storage/app/'.$pic;
                          @endphp
                            <form role="form" method="post" action="{{route('admin.product.edit', $product->id_product)}}" enctype="multipart/form-data">
                              @csrf
                                <div class="form-group">
                                    <label>Name Product</label>
                                    <input type="text" name="nameproduct" class="form-control" value="{{$product->name_product}}" />
                                </div>
                                <div class="form-group">
                                    <label>Type Product</label>
                                    <select class="form-control" name="typeproduct">
                                      @foreach ($typeproduct as $type)
                                        @php
                                          $idtype = $type->id_type_product;
                                          $tname = $type->name_type_product;
                                          $selected = '';
                                        @endphp
                                        @if($idtype == $product->id_type_product)
                                          @php
                                            $selected = 'selected';
                                          @endphp
                                        @endif
                                        <option value="{{$idtype}}" {{$selected}}>{{$tname}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Discount Product</label>
                                    <input type="number" name="discount" class="form-control" value="{{$product->discount}}" required />
                                </div>
                                <div class="form-group">
                                    <label>Price Product</label>
                                    <input type="number" name="price" class="form-control" value="{{$product->price_product}}" required />
                                </div>
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input type="file" name="picture" class="form-control" value="" style="opacity: 1999; position: relative; z-index: 1" />
                                    <label>Last Picture :</label><br/>
                                    <img src="{{$Urlpic}}" class="img-responsive" alt="" width="100px" height="130px">
                                </div>

                                <div class="form-group">
                                    <label>Picture Detail</label>
                                    <input type="file" name="gallery[]" multiple="multiple" class="form-control" value="" style="opacity: 1999; position: relative; z-index: 1" />
                                    <div class="row" style="margin: 20px 0 50px 0;">
                                      @foreach($picture as $pict)
                                      <div class="col-md-4 picture-demo" style="border: 1px solid red; text-align: center">
                                        <img src="http://localhost/shop/storage/app/{{$pict->url_picture}}" class="img-response" style="width: 100%; height: 100%" alt="">
                                        <p></p>
                                        <a href="javascript:void(0)" data-id="{{$pict->id_picture}}" title="" class="remove-pic-js" data-token="{{ csrf_token() }}">Remove</a>
                                      </div>
                                      @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="margin: 20px 0 0 0;">Description</label>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="description" rows="3" required name="description">{{$product->des_product}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom: 0px;">Infomation Product</label>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="info" required rows="3" name="info">{{$product->info_product}}</textarea>
                                </div>
                                <div style="text-align: center">
                                <button type="submit" name="submit" class="btn btn-success btn-md"  style="width: 20%">Add</button>
                                </div>
                            </form>
                        </div>
                      </div>
                  </div>

              </div>
          </div>
          <!--End Advanced Tables -->
      </div>
  </div>
</div>
<script type="text/javascript">
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
  });
  $(document).ready(function() {
    $(".remove-pic-js").click(function() {
      self = $(this);
      id = self.data('id');
      div = self.parents('.picture-demo');
      $.ajax({
        url: "/admin/product/remove/"+id,
        type: 'get',
        cache: false,
        data: {"id":id},
        success: function(data){
          div.remove();
          alertify.success('Success');
        }
      });
    });
  })
</script>
@endsection
