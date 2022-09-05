<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $albums = Album::orderBy('id' , 'DESC')->paginate(30);

        return view('Album.index' , compact('albums'));


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
        $this->validate($request , [
            'name'=>'sometimes|max:200|unique:albums',
        ]);

        Album::create($request->all());

        return back()->with('success' , 'The Album has Been Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $album = Album::with('images')->where('id', $id)->first();

        return view('Album.gallery', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $album =Album::findOrFail($request->album_id);

        $this->validate($request , [
            'name'=>'sometimes|max:200|unique:albums,name,' . $album->id,
        ]);

        $album->name = $request->name;
        $album->save();

        return back()->with('success' , 'The Album has Been Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Album $album)
    {
        $album =Album::findOrFail($request->album_id);

        $this->validate($request , [
            'name'=>'sometimes|max:200|unique:albums,name,' . $album->id,
        ]);

        File::deleteDirectory(public_path('/Images/' . $album->name));
        Album::destroy($album->id);

        return back()->with('success' , 'The Album has Been Deleted Successfully !');
    }

    public function storeImages(Request $request)
    {

        if (! is_dir(public_path('/Images/' . $request->album_name))) {
            mkdir(public_path('/Images/' . $request->album_name ) , 0777);
        }

        $image = $request->file('file');

        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        $imageEX = $image->getClientOriginalName() ;

        $image->move(public_path('/Images/' . $request->album_name . '/') , $imageEX);

//        $try =Image::make($image)->resize(1500, 2000)->save(public_path('/Images/' . $request->album_name . '/' . $imageName));
        $Image = new Image();

        $Image->album_id = $request->album_id;

        $Image->name = $imageName;

        $Image->image = $imageEX;

        $Image->save();

        return back()->with('success' , 'The Images Has Uploaded Successfully !!');
    }

    public function deleteImage($id)
    {
        $image =Image::findOrFail($id);
        $album = Album::findOrFail($image->album_id);
        File::delete(public_path('Images/' . $album->name . '/' . $image->image));
        $image->delete();

        return back()->with('success' , 'The Image Has Deleted Successfully !!');
    }

    public function move(Request $request)
    {
        $images =Image::where('album_id', $request->old_album_id)->get();
        foreach ($images as $image){
            $image->album_id = $request->new_album_id;
            $image->save();
        }
        return back()->with('success' , 'The Image Has Been Moved Successfully !!');
    }
}
