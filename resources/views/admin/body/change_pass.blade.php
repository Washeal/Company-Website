@extends('admin.admin_master')

@section('page')



<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                       Chnage Password
                        </div>
                        <div class="card-body">
                      

                       
                           <form action="{{route('password.update')}}" method="post" >
                               @csrf
                              
                                <div class="form-group">
                                    <label for="email">Current Password</label>
                                    <input type="password" name="old_password" class="form-control" placeholder="Current Password"  id="current_password" >
                                      @error('old_password')
                                      <span class="text-danger">{{$message}}</span>

                                      @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="New Password"id="password"  >
                                    @error('password')
                                      <span class="text-danger">{{$message}}</span>

                                      @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Confirm Password </label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="password_confirmation" >
                                    @error('password_confirmation')
                                      <span class="text-danger">{{$message}}</span>

                                      @enderror
                                </div>

                               
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>

                    </div>
              </div>





@endsection