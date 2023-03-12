<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\User;
use App\UserProfiles;
use App\Gallery;
use App\GalleryTypes;
 
class UserProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $gallery = Gallery::where('user_id', Auth::user()->id)->get();
        $gallerytemplate = GalleryTypes::get();

        $userprofile=UserProfiles::rightJoin('users', 'users.id', '=', 'userprofiles.user_id')
        ->select('userprofiles.*')
        ->where('users.id',Auth::user()->id) 
        ->get()->toArray();
        
 
        return view('web.userprofile.index', ['gallery' => $gallery,"gallerytemplates"=>$gallerytemplate,"userprofile"=>$userprofile[0]]);

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
        $request->validate([
            'image_name' => 'mimes:png,jpg,jpeg,jfif,webp,avif|max:2048|dimensions:min_width=20,min_height=10',
         ]);

        try
        {
            $userProfile = UserProfiles::where('user_id',Auth::user()->id)->first();   

            if (empty($userProfile)) 
            {  
                if ($request->hasFile('image_name')) 
                {
                    $photo = $request->file('image_name');                                              
                    $filename = 'profile' . '-' . Auth::user()->id . '.' . $photo->getClientOriginalExtension();
                    $location = public_path('userimages/'.Auth::user()->id.'/profileimages/');
                    $request->file('image_name')->move($location, $filename);
                    $userProfile->profile_image = $filename;
                }  
                
                $userProfile = new UserProfiles;                  
                $userProfile->gallery_type_id = $request->input('selectradio');
                $userProfile->user_id = Auth::id();
                $userProfile->save();
            }
            else
            {  
                $oldProfileImage = $userProfile->profile_image;
                if ($request->hasFile('image_name')) 
                {
                    $photo = $request->file('image_name');
                    if(!empty($oldProfileImage))
                    {
                        Storage::delete($oldProfileImage);
                    }                                
                    $filename = 'profile' . '-' . Auth::user()->id . '.' . $photo->getClientOriginalExtension();
                    $location = public_path('userimages/'.Auth::user()->id.'/profileimages/');
                    $request->file('image_name')->move($location, $filename);
                    $userProfile->profile_image = $filename;
                }       
                $userProfile->gallery_type_id = $request->input('selectradio');
                $userProfile->save();
            }
            return redirect()->route('home'); 
        }
        catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Valid file and title required');
        }   
         
        

        
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
}
