@extends('admin.admin_master')

@section('page')

<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                           Create Slider
                        </div>
                        <div class="card-body">

                       
                           <form action="{{route('Home.store')}}" method="post" >
                               @csrf
                              
                                <div class="form-group">
                                    <label for="title_name">Title</label>
                                    <input type="text" name="title_name" class="form-control" id="title_name" required="required">

                                </div>
                                <div class="form-group">
                                    <label for="short_descrip">Short Description</label>
                                    <input type="text" name="short_descrip" class="form-control" id="short_descrip" required="required">

                                </div>
                                <div class="form-group">
                                    <label for="long_descrip">Long Description</label>
                                    <input type="text" name="long_descrip" class="form-control" id="long_descrip" required="required">

                                </div>

                               
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
              </div>







@endsection