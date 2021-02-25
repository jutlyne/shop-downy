 @extends('template.admin.master')
@section('main-content-admin')
        <!-- /. ROW  -->
        <div class="" style="margin: 200px 50px">
          <div class="">
            <h3 style="color: #d35400; text-align: center">Add Product Type</h3>
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
                                    <form role="form" method="post" action="{{route('admin.typeproduct.add')}}" enctype="multipart/form-data">
                                      @csrf
                                        <div class="form-group">
                                            <label>Name Room Type</label>
                                            <input type="text" name="nametype" class="form-control" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea class="form-control" id="destype" rows="3" required name="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Picture 1</label>
                                            <input type="file" name="pic1" required class="form-control" value="" style="opacity: 1999; position: relative; z-index: 1" />
                                        </div>
                                        <div class="form-group">
                                            <label>Picture 2</label>
                                            <input type="file" name="pic2" required class="form-control" value="" style="opacity: 1999; position: relative; z-index: 1" />
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
