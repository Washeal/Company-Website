@extends('admin.admin_master')

@section('page')



<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                      Uase Profile Update
                        </div>
                        <div class="card-body">
                      
                        @if(session('success'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
             @endif
                       
                           <form action="{{route('profile.store')}}" method="post" >
                               @csrf
                              
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{$users['name']}}" name="name" class="form-control" >
                                     
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"value="{{$users['email']}}"  name="email" class="form-control">
                                    
                                </div>
                                

                               
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>

                    </div>
              </div>





@endsection