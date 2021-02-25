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
            <h4 class="card-title ">User</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="width: 100%; text-align: center">
                <thead class=" text-primary">
                  <tr>
                    <th style="width: 10%">
                      ID
                    </th>
                    <th style="width: 30%">
                      Name
                    </th>
                    <th style="width: 40%">
                      Username
                    </th>
                    <th style="width: 20%">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($auser as $ausers)
                  @php
                    $username = $ausers->username;
                    $fullname   = $ausers->fullname;
                    $id = $ausers->id;

                  @endphp
                  <tr>
                    <td>{{$id}}</td>
                    <td>{{$fullname}}</td>
                    <td>{{$username}}</td>
                    <td class="text-primary">
                      <a href="{{route('admin.user.edit', $ausers->id)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
                      <a href="@if(!$isAdmin) javascript:void(0) @else {{route('admin.user.delete', $ausers->id)}} @endif" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="row">
                  <div class="col-sm-12">
                      <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                          <ul class="pagination">
                              {{ $auser->links() }}
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
@endsection
