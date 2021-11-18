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
             <a href="{{route('add.slider')}}"><button class="btn btn-info">Add Slider</button></a>

                  <div class="card">
                      <div class="card-header">
                          All Catagory
                      </div>

                 
          <table class="table">
            <thead>
                <tr>
                <th scope="col" width="5%">SL NO</th>
                <th scope="col"width="15%">Title </th>
                <th scope="col"width="35%">Description </th>
                <th scope="col"width="15%">Image</th>
                <th scope="col"width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php($in=1)
                @foreach($sliders as $slider)
                <tr>
                <th scope="row">{{$in++}}</th> 
                <td>{{$slider->title}}</td>
                <td>{{$slider->decription}}</td>
                <td> <img src="{{asset($slider->image)}}" style="height:60px; width:60px" >  </td>
                
               
                <td>
                    <a class="btn btn-info" href="{{url('slider/edit/'.$slider->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{url('delete/slider/'.$slider->id)}}" onclick="return confirm('are you sure to delete')">Delete</a>
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
