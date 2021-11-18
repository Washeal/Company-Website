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
             <a href="{{route('about.Create')}}"><button class="btn btn-info">Add About</button></a>

                  <div class="card">
                      <div class="card-header">
                          All About
                      </div>

                 
          <table class="table">
            <thead>
                <tr>
                <th scope="col" width="5%">SL NO</th>
                <th scope="col"width="15%">Title </th>
                <th scope="col"width="15%">Short Description </th>
                <th scope="col"width="35%">Long Description</th>
                <th scope="col"width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php($in=1)
                @foreach($abouts as $about)
                <tr>
                <th scope="row">{{$in++}}</th> 
                <td>{{$about->title}}</td>
                <td>{{$about->short_descrip}}</td>
                <td> {{$about->long_descrip}}</td>
                
               
                <td>
                    <a class="btn btn-info" href="{{url('Edit/About/'.$about->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{url('delete/About/'.$about->id)}}" onclick="return confirm('are you sure to delete')">Delete</a>
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
