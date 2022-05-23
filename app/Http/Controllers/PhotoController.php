<?php

namespace App\Http\Controllers;

use App\photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            "photo.*" => "mimes:png,jpg,jpeg",
            
        ]);

        $fileNameArr = []; //this is location

        foreach ($request->file('photo') as $file) {
        $newFileName = uniqid(). "_profile.".$file->getClientOriginalExtension();
        array_push($fileNameArr,$newFileName);
        $dir = "/public/article";
            Storage::putFileAs($dir,$file,$newFileName);
        }

        foreach($fileNameArr as $file){
            $photo = new photo();
            $photo->article_id = $request->article_id;
            $photo->location = $file; 
            $photo->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(photo $photo)
    {
        //
    }
}
