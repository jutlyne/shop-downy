 @extends('template.admin.master')
@section('main-content-admin')
        <!-- /. ROW  -->
        <div class="" style="margin: 200px 50px">
          <div class="">
            <h3 style="color: #d35400; text-align: center">Show Order</h3>
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
                                    <form role="form" method="post" {{route('admin.order.index')}} enctype="multipart/form-data">
                                      @csrf
                                      @foreach($order as $orders)
                                      @php
                                       $idorder = $orders->id;
                                      @endphp
                                        <div class="form-group" style="text-align: center">
                                            <label>Fullname - Address</label>
                                            <input type="text" style="text-align: center" name="subject" value="{{$orders->fullname}} - {{$orders->address}}" disabled class="form-control" />
                                        </div>
                                      @endforeach
                                      <div class="card-body">
                                        <div class="table-responsive">
                                          <table class="table">
                                            <thead class=" text-primary">
                                              <tr>
                                                <th style="width: 25%; text-align: center">
                                                  STT
                                                </th>
                                                <th style="width: 25%; text-align: center">
                                                  Name Product
                                                </th>
                                                <th style="width: 25%; text-align: center">
                                                  Quantity
                                                </th>
                                                <th style="width: 25%; text-align: center">
                                                  Price
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @php
                                                $stt = 0;
                                                $sum = 0;
                                              @endphp
                                              @foreach($products as $i)
                                                 @php
                                                     $price = $i->price_product;
                                                     $count = $i->count;
                                                     $sum = $sum + ($price * $count);
                                                     $stt = ++$stt;
                                                 @endphp
                                              <tr>
                                                <td style="width: 25%; text-align: center">{{$stt}}</td>
                                                <td style="width: 25%; text-align: center">{{$i->name_product}}</td>
                                                <td style="width: 25%; text-align: center">{{$i->count}}</td>
                                                <td style="width: 25%; text-align: center">${{$i->price_product}}</td>
                                              </tr>
                                              @endforeach
                                              <tr style="background: #bdc3c7">
                                                <td colspan="3" style="width: 25%; text-align: center">Total money</td>
                                                <td style="width: 25%; text-align: center">${{$sum}}</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                        <div style="text-align: center">
                                        <a href="{{ route('admin.order.delivery', $idorder) }}" name="submit" class="btn btn-success btn-md"  style="width: 20%; color: #fff">Delivery</a>
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
