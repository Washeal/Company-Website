@extends('admin.admin_master')

@section('page')

      <div class="container">
          <div class="row"> 
              

            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                        Edit Catagory
                        </div>
                        <div class="card-body">

                       
                           <form action="{{url('catagory/update/'.$catagorys->id)}}" method="post">
                               @csrf
                                <div class="form-group">
                                    <label for="catagory_name"> Catagory Name</label>
                                    <input type="text" name="catagory_name" value="{{$catagorys->cata_name}}" class="form-control" id="catagory_name" required="required">

                                    @error('catagory_name')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                    
                                </div>
                           
                                <button type="submit" class="btn btn-primary">Update Cattagory</button>
                            </form>
                        </div>

                    </div>
              </div>

       </div>
  </div>  





  

@endsection('page')
