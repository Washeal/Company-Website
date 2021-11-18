@extends('admin.admin_master')

@section('page')

      <div class="container">
          <div class="row"> 
             
          <div class="col-md-8">
              <div class="card-group">
                  @foreach($images as $image)

                  <div class="col-md-4 mt-5">
                      <div class="card">
                          <img src="{{asset($image->image)}}" alt="">

                      </div>

                  </div>



                  @endforeach

              </div>

          </div>
                  

            <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                          Multi Image
                        </div>
                        <div class="card-body">

                       
                           <form action="{{route('store.img')}}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="form-group">
                                    <label for="image_m">Multi Image</label>
                                    <input type="file"  name="image_m[]" class="form-control" multiple >

                                    
                                </div>

                               
                           
                                <button type="submit" class="btn btn-primary">Add Multi Image</button>
                            </form>
                        </div>

                    </div>
              </div>

       </div>
  </div>  






@endsection
