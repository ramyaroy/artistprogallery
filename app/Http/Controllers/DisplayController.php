<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\UserProfiles;
use App\Models\Gallery;
use App\Models\GalleryTypes;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userprofile=UserProfiles::select('*')
        ->join('users', 'users.id', '=', 'userprofiles.user_id')
        ->limit(8)
        ->get()->toArray();

         

        return view('web.users.index',['users'=>$userprofile]);
    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchuser($username)
    {        
        $user = User::where('username','=',$username)->firstOrFail(); 
        $userid = $user['id'];

        $getGalleryList= User::select('*',)
        ->join('userprofiles', 'users.id', '=', 'userprofiles.user_id')
        ->join('galleries','users.id', '=', 'galleries.user_id')
        ->where('users.id','=',$userid)
        ->orderBy('galleries.created_at','DESC')
        ->get()->toArray();

        $galleryTypeChoosen=UserProfiles::select('*')
         ->join('gallery_types', 'gallery_types.id', '=', 'userprofiles.gallery_type_id')
        ->where('userprofiles.user_id',$userid) 
        ->get()->toArray();      
        
        if(!empty($galleryTypeChoosen))
        {
            $galleryTypeChoosen = $galleryTypeChoosen[0];
        }

        return view('web.users.sliders', ['getGalleryList' => $getGalleryList,'galleryTypeChoosen'=>$galleryTypeChoosen]);

    }
}
