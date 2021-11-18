@extends('admin.admin_master')

@section('page')

<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                           Create Slider
                        </div>
                        <div class="card-body">

                       
                           <form action="{{route('store.contact')}}" method="post" >
                               @csrf
                              
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" required="required">

                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" required="required">

                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" required="required">

                                </div>

                               
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
              </div>







@endsection