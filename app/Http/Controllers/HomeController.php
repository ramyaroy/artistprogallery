<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserProfiles;
use App\Models\Gallery;
use App\Models\GalleryTypes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getGalleryList= User::select('galleries.*',)
        ->join('userprofiles', 'users.id', '=', 'userprofiles.user_id')
        ->join('galleries','users.id', '=', 'galleries.user_id')
        ->where('users.id','=',Auth::user()->id)
        ->orderBy('galleries.created_at','DESC')
        ->get()->toArray();

        $galleryTypeChoosen=UserProfiles::select('*')
         ->join('gallery_types', 'gallery_types.id', '=', 'userprofiles.gallery_type_id')
        ->where('userprofiles.user_id',Auth::user()->id) 
        ->get()->toArray();      
        
        if(!empty($galleryTypeChoosen))
        {
            $galleryTypeChoosen = $galleryTypeChoosen[0];
        }

        return view('login.home',['getGalleryList' => $getGalleryList,'galleryTypeChoosen'=>$galleryTypeChoosen]);
    }
}
