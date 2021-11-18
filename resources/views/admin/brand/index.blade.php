@extends('admin.admin_master')

@section('page')


      <div class="container">
          <div class="row"> 
              <div class="col-md-8">
             

                  <div class="card">
                      <div class="card-header">
                          All Catagory
                      </div>

                 
          <table class="table">
            <thead>
                <tr>
                <th scope="col">SL NO</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Brand Image</th>
                <th scope="col">Create At</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <!-- @php($in=1) -->
                @foreach($brands as $brand)
                <tr>
                <th scope="row">{{$brands->firstitem()+$loop->index}}</th> 
                <td>{{$brand->brand_name}}</td>
                <td> <img src="{{asset($brand->brand_image)}}" style="height:60px; width:60px" >  </td>
                
                <td>
                @if($brand->created_at==null)
                 <span class="text-danger">No Data Set</span>
                 @else
                    {{($brand->created_at)->diffForHumans()}}
                 @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{url('brand/edit/'.$brand->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{url('delete/brand/'.$brand->id)}}" onclick="return confirm('are you sure to delete')">Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
       {{ $brands->links() }}

       </div>
          </div>

            <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                           Add Brand
                        </div>
                        <div class="card-body">

                       
                           <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="brand_name" required="required">

                                    
                                </div>

                                <div class="form-group">
                                    <label for="brand_image">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" id="brand_image" required="required">

                                    
                                </div>
                           
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>

                    </div>
              </div>

       </div>
  </div>  






@endsection
