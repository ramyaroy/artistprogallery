@extends('layouts.app')

@section('content')

<div class="container mt-4">
    
        
    <div class="jumbotron text-center">
        <h1>{{ __('Welcome To Your Dashboard') }}</h1>
        <h2><a class="nav-link-custom" href="{{ route('userprofile.index') }}">Customize</a> Your Profile </h2>

    </div>    
    
    <div class="row">
        
        @php
        $counter = 0; $htmlrender='';$active=''; $templateString=''; $carouselControlsIndicator='';
        foreach($getGalleryList as $slider)
        { 
            if($counter==0)
            {
                $active='active';
            }
            else
            {
                $active='';
            }

            $carouselControlsIndicator.='<li data-target="#carouselControlsIndicator" data-slide-to="'.$counter.'" class="'.$active.'">';
            
            $htmlrender .= '<div class="carousel-item '.$active.'">
            <img class="d-block w-100" src="'.url("userimages").'/'.Auth::user()->id.'/'.$slider['image_name'].'" alt="'.$slider['alt_image_name'].'"  width="100%" height="50%">
          </div>';
        @endphp
        
        @php 
        $counter++ ; 
        
        $shortcodes = ['[carouselcode]', '[carouselControlsIndicator]'];
        $replacewith   = [$htmlrender,$carouselControlsIndicator];
        $htmltemplate = $galleryTypeChoosen['template'];

        $templateString = str_replace($shortcodes, $replacewith, $htmltemplate);
        
        } 
        echo '<div class="col-sm-12"> <h3>Gallery </h3> </div>';

        if(!empty($templateString))
        {
            
            echo $templateString;
        }
        else
        {
        @endphp
          <p>Empty Gallery. Please upload your  <a href="<?=url('gallery')?>">pictures</a> to get started</p>
        @php
        }
         
            
        @endphp

        

    </div>    

                 
    @if (session('status'))<div class="alert alert-success" role="alert">{{ session('status') }}</div>@endif                     
    
        
    
</div>
@endsection
