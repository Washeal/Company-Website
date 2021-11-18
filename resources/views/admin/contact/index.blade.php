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
             <a href="{{route('create.contact')}}"><button class="btn btn-info">Add Contact</button></a>

                  <div class="card">
                      <div class="card-header">
                          All About
                      </div>

                 
          <table class="table">
            <thead>
                <tr>
                <th scope="col" width="5%">SL</th>
                <th scope="col"width="15%">Email </th>
                <th scope="col"width="15%">Address </th>
                <th scope="col"width="35%">Phone</th>
                <th scope="col"width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php($in=1)
                @foreach($contacts as $contact)
                <tr>
                <th scope="row">{{$in++}}</th> 
                <td>{{$contact->email}}</td>
                <td>{{$contact->address}}</td>
                <td> {{$contact->phone}}</td>
                
               
                <td>
                    <a class="btn btn-info" href="{{url('edit/contact/'.$contact->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{url('delete/contact/'.$contact->id)}}" onclick="return confirm('are you sure to delete')">Delete</a>
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
