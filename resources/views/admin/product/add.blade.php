 @extends('template.admin.master')
@section('main-content-admin')
        <!-- /. ROW  -->
        <div class="" style="margin: 200px 50px">
          <div class="">
            <h3 style="color: #d35400; text-align: center;">Add Product</h3>
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
                                    <form role="form" method="post" action="{{route('admin.product.add')}}" enctype="multipart/form-data">
                                      @csrf
                                        <div class="form-group">
                                            <label>Name Product</label>
                                            <input type="text" name="nameproduct" class="form-control" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Type Product</label>
                                            <select class="form-control" name="typeproduct">
                                              @foreach ($typeproduct as $typeproducts)
                                                @php
                                                  $id = $typeproducts->id_type_product;
                                                  $rname = $typeproducts->name_type_product;
                                                @endphp
                                                <option value="{{$id}}">{{$rname}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Discount Product</label>
                                            <input type="number" name="discount" class="form-control" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Price Product</label>
                                            <input type="number" name="price" class="form-control" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Picture</label>
                                            <input type="file" name="picture" required class="form-control" value="" style="opacity: 1999; position: relative; z-index: 1" />
                                        </div>
                                        <div class="form-group">
                                            <label>Picture Detail</label>
                                            <input type="file" name="gallery[]" required multiple="multiple" class="form-control" value="" style="opacity: 1999; position: relative; z-index: 1" />
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-bottom: 0px;">Description</label>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="description" rows="3" required name="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-bottom: 0px;">Infomation Product</label>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="info" required rows="3" name="info"></textarea>
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
@endsection
