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
                <th scope="col">Catagory Name</th>
                <th scope="col">User</th>
                <th scope="col">Create At</th>
                </tr>
            </thead>
            <tbody>
                <!-- @php($in=1) -->
                @foreach($catagorys as $category)
                <tr>
                <th scope="row">{{$catagorys->firstitem()+$loop->index}}</th> 
                <td>{{$category->cata_name}}</td>
                <td>{{$category->user->name}}</td>
                
                <td>
                @if($category->created_at==null)
                 <span class="text-danger">No Data Set</span>
                 @else
                    {{($category->created_at)->diffForHumans()}}
                 @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{url('catagory/edit/'.$category->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{url('softdelete/catagory/'.$category->id)}}">Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
       {{ $catagorys->links() }}

       </div>
          </div>

            <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                           Add Catagory
                        </div>
                        <div class="card-body">

                       
                           <form action="{{route('catagorys')}}" method="post">
                               @csrf
                                <div class="form-group">
                                    <label for="catagory_name">Catagory Name</label>
                                    <input type="text" name="catagory_name" class="form-control" id="catagory_name" required="required">

                                    @error('catagory_name')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                    
                                </div>
                           
                                <button type="submit" class="btn btn-primary">Add Cattagory</button>
                            </form>
                        </div>

                    </div>
              </div>

       </div>
  </div>  



         <!-- TRASH PART -->

  <div class="container">
          <div class="row"> 
              <div class="col-md-8">
             

                  <div class="card">
                      <div class="card-header">
                          Trash Catagory
                      </div>

                 
          <table class="table">
            <thead>
                <tr>
                <th scope="col">SL NO</th>
                <th scope="col">Catagory Name</th>
                <th scope="col">User</th>
                <th scope="col">Create At</th>
                </tr>
            </thead>
            <tbody>
                <!-- @php($in=1) -->
                @foreach($trash as $category)
                <tr>
                <th scope="row">{{$catagorys->firstitem()+$loop->index}}</th> 
                <td>{{$category->cata_name}}</td>
                <td>{{$category->user->name}}</td>
                
                <td>
                @if($category->created_at==null)
                 <span class="text-danger">No Data Set</span>
                 @else
                    {{($category->created_at)->diffForHumans()}}
                 @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{url('catagory/resote/'.$category->id)}}">Resote</a>
                    <a class="btn btn-danger" href="{{url('catagory/pdelete/'.$category->id)}}">P Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
       {{ $trash->links() }}

       </div>
          </div>

           

       </div>
  </div>  


@endsection
