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
          <h4 class="card-title ">Comment</h4>
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
                    Name Product
                  </th>
                  <th>
                    Comment
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($comment as $comments)
                  @php
                    $id = $comments->id_review;
                    $rname = $comments->name;
                    $cmt = Str::limit($comments->review,100);
                    $email = $comments->email;
                  @endphp
                <tr>
                  <td>{{$id}}</td>
                  <td>{{$rname}}</td>
                  <td style="word-wrap:break-word; width: 350px">{{$cmt}}</td>
                  <td>{{$email}}</td>
                  <td class="text-primary">
                    <!-- //@if(!$isAdmin) disabled @endif -->
                    <a href="javascript:void(0)" data-id="{{$id}}" title="" class="btn btn-danger btn-remove-comment-js"><i class="fa fa-pencil"></i>Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                        <ul class="pagination">
                            {{ $comment->links() }}
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
  $(".btn-remove-comment-js").click(function() {
    self = $(this);
    id = self.data('id');
    tr = self.parents('tr');
    $.ajax({
      url: "comment/delete/"+id,
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
</script>
@stop
