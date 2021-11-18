@extends('admin.admin_master')

@section('page')

<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                           Create Slider
                        </div>
                        <div class="card-body">

                       
                           <form action="{{url('update/About/'.$abouts->id)}}" method="post" >
                               @csrf
                                <div class="form-group">
                                    <label for="title_name">Title</label>
                                    <input type="text" value="{{$abouts->title}}" name="title_name" class="form-control" id="title_name" required="required">

                                </div>
                                <div class="form-group">
                                    <label for="short_descrip">Title</label>
                                    <input type="text" value="{{$abouts->short_descrip}}" name="short_descrip" class="form-control" id="short_descrip" required="required">

                                </div>
                                <div class="form-group">
                                    <label for="long_descrip">Title</label>
                                    <input type="text" value="{{$abouts->long_descrip}}" name="long_descrip" class="form-control" id="long_descrip" required="required">

                                </div>

                               
                                <button type="submit" class="btn btn-primary">Add About</button>
                            </form>
                        </div>

                    </div>
              </div>







@endsection