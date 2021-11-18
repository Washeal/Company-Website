@extends('admin.admin_master')

@section('page')




<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                           Create Slider
                        </div>
                        <div class="card-body">

                       
                           <form action="{{url('slider/update/'.$slides->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                               <input type="hidden" name="old_img" value="{{$slides->image}}">
                                <div class="form-group">
                                    <label for="title_name">Title</label>
                                    <input type="text" name="title_name" value="{{$slides->title}}" class="form-control" id="title_name">

                                    
                                </div>

                                <div class="form-group">
                                    <label for="descrip_txt">Description</label>
                                 <input type="text" name="descrip_txt" value="{{$slides->decription}}" class="form-control" id="descrip_txt">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="Slide_image">Image</label>
                                    <input type="file" name="Slide_image" value="{{$slides->image}}" class="form-control" id="Slide_image">

                                    
                                </div>

                                <div class="form-group">
                                    <img src="{{asset($slides->image)}}" style="height:300px; width=400px;" alt="">

                                </div>
                           
                                <button type="submit" class="btn btn-primary">Add Slider</button>
                            </form>
                        </div>

                    </div>
              </div>











@endsection