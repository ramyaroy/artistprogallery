@extends('layouts.app')

@section('content')

<div class="container mt-4">   
    <div class="jumbotron ">
        <h1 class="text-center">{{ __('Customize Your Profile') }}</h1>

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
         

        <form action="{{ route('userprofile.store') }}" method="post" enctype="multipart/form-data">
             @csrf

            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label>Image </label>
                        <input type="file" class="form-control" name="image_name" id="image_name">
                        <small class="form-text text-muted">Please upload a valid image file.</small>
                        @php
                        if(!empty($userprofile['profile_image']))
                        {
                        @endphp
                        <img src="{{url('userimages')}}/{{Auth::user()->id}}/profileimages/{{$userprofile['profile_image']}}" class="img-fluid mt-2"  width="150" height="100" >
                        @php    
                        }
                        @endphp
                    </div>
                </div>
            </div>
            

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Choose Template Type</legend>
                    <div class="col-sm-10">                        
                        @php                                             
                        foreach($gallerytemplates as $gallerytemplate)
                        {                             
                        @endphp
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="selectradio" 
                              <?php if( $gallerytemplate['id']==$userprofile['gallery_type_id'] )
                              echo "checked";
                              ?>
                            id="templateradio-@php echo $gallerytemplate['id'] @endphp" value="@php echo $gallerytemplate['id'] @endphp">
                            <label class="form-check-label" for="templateradio-@php echo $gallerytemplate['id'] @endphp">
                             @php echo $gallerytemplate['gallery_type_name'] @endphp
                            </label>
                        </div> 
                        @php
                        }
                        @endphp                       
                    </div>
                </div>
            </fieldset>   
                 
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </div>             
        </form> 
    </div>     
</div>
@endsection

