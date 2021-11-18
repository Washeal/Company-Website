@extends('admin.admin_master')

@section('page')

<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                           Create Slider
                        </div>
                        <div class="card-body">

                       
                           <form action="{{route('store.slider')}}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="form-group">
                                    <label for="title_name">Title</label>
                                    <input type="text" name="title_name" class="form-control" id="title_name" required="required">

                                    
                                </div>

                                <div class="form-group">
                                    <label for="descrip_txt">Description</label>
                                 <textarea class="form-control" name='descrip_txt'></textarea>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="Slide_image">Image</label>
                                    <input type="file" name="Slide_image" class="form-control" id="Slide_image" required="required">

                                    
                                </div>
                           
                                <button type="submit" class="btn btn-primary">Add Slider</button>
                            </form>
                        </div>

                    </div>
              </div>







@endsection