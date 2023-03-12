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

        <div class="col-12">
        <a class="btn btn-sm btn-dark" href="<?=route('gallery.create')?>" >Create Gallery</a>
        </div>

        <div class="col-12 col-sm-8 mt-5">
            <h6 class="text-muted">Personalize Your Images</h6> 
            <ul class="list-group">
                @php
                if($sliders->isNotEmpty())
                {
                    foreach($sliders as $slider)
                    {
                @endphp

                 
                    
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$slider->alt_image_name}} 
                            <div class="image-parent">
                                <img src="{{url('userimages')}}/{{Auth::user()->id}}/{{$slider->image_name}}" class="img-fluid" alt="{{$slider->alt_image_name}}" width="150" height="50">
                            </div>

                            <div class="image-parent">
                                <a href="{{ route('gallery.edit', $slider->id) }}" class="btn btn-sm btn-info">Edit <i class="fa fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['gallery.destroy', $slider->id] ]) !!}
                                <button class="btn btn-sm btn-danger" type="submit"> Delete <i class="fa fa-trash"></i> </button>
                                {!! Form::close() !!}
                            </div>
                        </li> 
                    @php
                    }
                }
                else
                 {
                @endphp
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                             <span>Empty List. Please Upload Images</span>         
                    </li>
                @php
                 }
                @endphp   
               
            </ul>
        </div>
  </div>
</div> 


@endsection