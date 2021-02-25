@extends('template.admin.master')
@section('main-content-admin')
       <!-- /. ROW  -->
       <div class="" style="margin: 200px 50px">
         <div class="">
           <h3 style="color: #d35400; text-align: center">Edit User</h3>
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

                                   <form role="form" method="post" action="{{route('admin.user.edit', $user->id)}}">
                                     @csrf
                                       <div class="form-group">
                                           <label>Username</label>
                                           <input type="text" name="username" class="form-control" value="{{$user->username}}" />
                                       </div>
                                       <div class="form-group">
                                           <label>Fullname</label>
                                           <input type="text" name="fname" class="form-control" value="{{$user->fullname}}" />
                                       </div>
                                       @if($permission == 'admin')
                                       <div class="form-group">
                                           <label>Permission</label>
                                           <select class="form-control" name="permission">
                                             @if($user->permission == 'admin')
                                             <option value="admin" selected>Admin</option>
                                             <option value="user">User</option>
                                             @else
                                             <option value="admin">Admin</option>
                                             <option value="user" selected>User</option>
                                             @endif
                                           </select>
                                       </div>
                                       @else
                                           <select class="form-control" style="display:none" name="permission">
                                             <option value="admin">Admin</option>
                                             <option value="user" selected>User</option>
                                           </select>
                                       @endif
                                       <div class="form-group">
                                           <label>Password</label>
                                           <input type="password" name="password" class="form-control" placeholder="If not changed, leave it blank" />
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
       <script type="text/javascript">

       </script>
@endsection
