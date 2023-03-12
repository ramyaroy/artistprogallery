@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">  

        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a class="text-dark" href="<?=url('dashboard')?>" >Dashboard</a></li>
                    <li class="breadcrumb-item active"><a class="text-info" href="<?=url('gallery')?>" >Gallery</a></li>
 
                 </ol>
            </nav>    
        </div>

        <form action="{{route('gallery.update',[$slider->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                     <button type="button" class="close" data-dismiss="alert">×</button>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label>Image </label>
                <input type="file" class="form-control" name="image_name" id="image_name">
                <small class="form-text text-muted">Please upload a valid image file. Minimum 750 *500 , 72dpi, Maximum 2MB.</small>
                <br>
                <img src="{{url('userimages')}}/{{Auth::user()->id}}/{{$slider->image_name}}" class="img-fluid" alt="{{$slider->alt_image_name}}" width="150" height="50">
            </div>

            <div class="form-group">
                <label>Image Name</label>
                <input type="text" class="form-control" name="alt_image_name" value="{{$slider->alt_image_name}}"/>
            </div>
             
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    </div>
</div>
@endsection