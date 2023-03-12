<?php

use Illuminate\Database\Seeder;
use App\Models\GalleryTypes;

class GalleryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galleryTypes = [
            ['gallery_type_name' => 'slidesonly','template'=>'<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              [carouselcode]  
            </div>
          </div>'],
            ['gallery_type_name' => 'withcontrols','template'=>'<div id="carouselControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               [carouselcode]
            </div>
            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>'],
            ['gallery_type_name' => 'withindicator','template'=>'<div id="carouselControlsIndicator" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                [carouselControlsIndicator]
             </ol>
           
             <div class="carousel-inner">
                [carouselcode]
             </div>
             <a class="carousel-control-prev" href="#carouselControlsIndicator" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselControlsIndicator" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>
           </div>'],
             
        ];

        foreach ($galleryTypes as $galleryType) {
            GalleryTypes::create($galleryType);
        }         
    }
}
