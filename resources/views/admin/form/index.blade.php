@extends('admin.admin_master')

@section('page')


      <div class="container">
          <div class="row"> 
              <div class="col-md-12">
              @if(session('success'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
             @endif

                  <div class="card">
                      <div class="card-header">
                          All About
                      </div>

                 
          <table class="table">
            <thead>
                <tr>
                <th scope="col" width="5%">SL</th>
                <th scope="col"width="15%">Name </th>
                <th scope="col"width="10%">Email </th>
                <th scope="col"width="15%">Subject</th>
                <th scope="col"width="40%">Message</th>
                <th scope="col"width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php($in=1)
                @foreach($forms as $form)
                <tr>
                <th scope="row">{{$in++}}</th> 
                <td>{{$form->name}}</td>
                <td>{{$form->email}}</td>
                <td> {{$form->subject}}</td>
                <td> {{$form->message}}</td>
                
               
                <td>
                    <a class="btn btn-danger" href="{{url('delete/form/'.$form->id)}}" >Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
      
       </div>
          </div>

            

       </div>
  </div>  






@endsection
