<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Gallery;

class GalleryController extends Controller
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
        $sliders = Gallery::orderby('id', 'desc')->paginate(10);
        return view('web.gallery.index', ['sliders'=>$sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view ('web.gallery.create');
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
            'image_name' => 'required|mimes:png,jpg,jpeg,jfif,webp,avif|max:2048|dimensions:min_width=750,min_height=500',
            'alt_image_name'=>'required|max:225',
         ]);

        try
        {
            $gallery = new Gallery;
            $gallery->alt_image_name = $request->input('alt_image_name');
            $gallery->user_id = Auth::id();
            if ($request->hasFile('image_name')) {
                $photo = $request->file('image_name');                
                $filename = 'slide' . '-' . time() . '.' . $photo->getClientOriginalExtension();
                $location = public_path('userimages/'.Auth::user()->id.'/');
                $request->file('image_name')->move($location, $filename);
                $gallery->image_name = $filename;
            }
            $gallery->save();
            return redirect()->route('gallery.index');
        }catch(\Exception $e){
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
        $slider = Gallery::findOrFail($id);
        return view('web.gallery.edit', ['slider'=>$slider]);
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
        $request->validate([
            'image_name' => 'required|mimes:png,jpg,jpeg,jfif,webp,avif|max:2048|dimensions:min_width=750,min_height=500',
            'alt_image_name'=>'required|max:225',
        ]);

        try
        {
            $gallery = Gallery::where('id',$id)->first();
             
            $gallery->alt_image_name = $request->input('alt_image_name');
            $gallery->user_id = Auth::id();
            
            if ($request->hasFile('image_name')) {
                $photo = $request->file('image_name');                
                $filename = 'slide' . '-' . time() . '.' . $photo->getClientOriginalExtension();
                Storage::delete($gallery->image_name);
                $location = public_path('userimages/'.Auth::user()->id.'/');
                $request->file('image_name')->move($location, $filename);
                $gallery->image_name = $filename; 
            }

            $gallery->save();
            return redirect()->route('gallery.index');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Valid file and title required');
        }         
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Gallery::findOrFail($id);
        Storage::delete($slider->image_name);
        $slider->delete();

        return  redirect()->route('gallery.index');
    }
}
