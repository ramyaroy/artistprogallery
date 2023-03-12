@extends('layouts.app')

@section('content')

<style>
    .card-wrapper {
  margin: 5% 0;
}

/* You can adjust the image size by increasing/decreasing the width, height */
.custom-circle-image {
  width: 8vw; /* note i used vw not px for better responsive */
  height: auto;
}

.custom-circle-image img {
  object-fit: cover;
}

.card-title {
  letter-spacing: 1.1px;
}

.card-text {
  font-family: MerriweatherRegular;
  font-size: 22px;
  line-height: initial;
}
</style>




<div id="all">
    <div id="content">
        <div class="container">
            <!-- *** ADVANTAGES START ***-->
            <div class="advantages">
                <div class="text-center">
                    <h1 class="text-uppercase" title="Community for creative people | artist pro club">
                       Welcome to <b>artistprogallery</b>. </h1>  
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 mt-5 ">
                        <p>
                        Welcome to artistprogallery . It's the world's most curated gallery.Build up your portfolio and share amongst others. <a href="<?=route('register')?>">Join Us</a> and get started.
                         </p> 
                        
                    </div>
                </div>
            </div>
            <!-- *** ADVANTAGES END ***-->                

            <section class="about-cards-section"> 
                <div class="row">
                    @php if(!empty($users))
                    {
                     echo '<div class="col-md-12 col-lg-12 mt-3">
                        <div class="how2 how2-cl4">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Explore artistprogallery artists
                            </h3>
                        </div>
                    </div>';
                    } 
                    @endphp                   
                </div> 

                        
                @php
                foreach($users as $user)
                {
                @endphp
                
                <div class="col-sm-2 card-wrapper">
                    <div class="card border-0">
                        <a class="text-dark" href="<?=url($user['username'])?>">
                            <div class="position-relative rounded-circle overflow-hidden mx-auto custom-circle-image">
                                @php
                                if(empty($user['profile_image']))
                                    {
                                @endphp
                                
                                <img class="w-100 h-100" src="{{url('/images/noprofileimage.jpg')}}" alt="{{$user['username']}}">
                                
                                @php    
                                    }
                                else
                                    {
                                @endphp
                                <img class="w-100 h-100" src="{{url('userimages')}}/{{$user['id']}}/profileimages/{{$user['profile_image']}}" alt="{{$user['username']}}">
                                @php
                                    }
                                @endphp
                            </div>
                            <div class="card-body text-center">
                                <h3 class="text-uppercase card-title"><a class="text-dark" href="<?=url($user['username'])?>">{{$user['name']}}</a></h3>
                            </div>
                        </a>
                    </div>
                </div>  
                @php
                }
                @endphp   
            </section>          
        </div>
    </div>
@endsection