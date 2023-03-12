@extends('layouts.app')

@section('content')

<div class="container mt-4"> 
    
    <div class="row">
        
        @php
        if(!empty($getGalleryList))
        {
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
                <img class="d-block w-100" src="'.url("userimages").'/'.$slider['user_id'].'/'.$slider['image_name'].'" alt="'.$slider['alt_image_name'].'"  width="100%" height="50%">
                </div>';
         
                $counter++ ; 
                
                $shortcodes = ['[carouselcode]', '[carouselControlsIndicator]'];
                $replacewith   = [$htmlrender,$carouselControlsIndicator];
                $htmltemplate = $galleryTypeChoosen['template'];
                $templateString = str_replace($shortcodes, $replacewith, $htmltemplate);
            
            } 

            if(!empty($templateString))
            {          
                echo $templateString;
            }
        }
            
        @endphp

        

    </div>    

                 
    @if (session('status'))<div class="alert alert-success" role="alert">{{ session('status') }}</div>@endif                     
    
        
    
</div>
@endsection
