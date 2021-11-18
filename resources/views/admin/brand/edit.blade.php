@extends('admin.admin_master')

@section('page')

      <div class="container">
          <div class="row">
              
          <div class="col-md-8">
              @if(session('success'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
             @endif
              

            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                        Edit Catagory
                        </div>
                        <div class="card-body">

                       
                           <form action="{{url('catagory/update/'.$brands->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                               <input type="hidden" name="old_img" value="{{$brands->brand_image}}">
                                <div class="form-group">
                                    <label for="brand_name"> Brand Name</label>
                                    <input type="text" name="brand_name" value="{{$brands->brand_name}}" class="form-control" id="brand_name" required="required">

                                  
                                    
                                </div>

                                <div class="form-group">
                                    <label for="brand_image"> Brand Image</label>
                                    <input type="file" name="brand_image" value="{{$brands->brand_image}}" class="form-control" id="brand_image">

                                  
                                    
                                </div>

                                <div class="form-group">
                                    <img src="{{asset($brands->brand_image)}}" style="height:300px; width=400px;" alt="">

                                </div>
                           
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>
                        </div>

                    </div>
              </div>

       </div>
  </div>  





@endsection
