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
                        Email
                      </th>
                      <th>
                        Subject
                      </th>
                      <th>
                        Messenge
                      </th>
                      <th>
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($contact as $contacts)
                      @php
                        $id = $contacts->id_contact;
                        $name = $contacts->name;
                        $subject = $contacts->subject;
                        $phone = $contacts->phone_number;
                        $email = $contacts->email;
                        $mes = $contacts->messenge;
                      @endphp
                    <tr>
                      <td>{{$id}}</td>
                      <td>{{$name}}</td>
                      <td>{{$phone}}</td>
                      <td>{{$email}}</td>
                      <td>{{$subject}}</td>
                      <td>{{$mes}}</td>
                      <td class="text-primary">
                        <a href="{{route('admin.contact.change', $id)}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i>Reply</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                                {{ $contact->links() }}
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
@stop
