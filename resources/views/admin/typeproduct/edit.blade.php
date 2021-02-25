@extends('template.admin.master')
@section('main-content-admin')
       <!-- /. ROW  -->
       <div class="" style="margin: 200px 50px">
         <div class="">
           <h3 style="color: #d35400; text-align: center">Edit Product Type</h3>
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
                                   <form role="form" method="post" action="{{route('admin.typeproduct.edit', $typeproduct->id_type_product)}}" enctype="multipart/form-data">
                                     @csrf
                                       <div class="form-group">
                                           <label>Name Room Type</label>
                                           <input type="text" name="nametype" class="form-control" value="{{$typeproduct->name_type_product}}" />
                                       </div>
                                       <div class="form-group">
                                           <label for="">Description</label>
                                           <textarea class="form-control" id="destype" rows="3" required name="description">{{$typeproduct->des_type}}</textarea>
                                       </div>
                                       <div style="text-align: center">
                                       <button type="submit" name="submit" class="btn btn-success btn-md"  style="width: 20%">Edit</button>
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
