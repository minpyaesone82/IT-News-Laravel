<?php

namespace App\Http\Controllers;

use App\Article;
use App\photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi(){
        $articles = Article::when(isset(request()->search),function ($query){
            $search = request()->search;
            return $query->orWhere("title","like","%$search%")->orWhere("description","like","%$search%");
        })->with('user','category')->latest('id')->paginate(10);
        return $articles;
    }
    public function index()
    {
        // $all = Article::all();
        // foreach($all as $a){
        //     $a->excerpt = Str::words($a->description,50);
        //     $a->update();
        // }
        
        $articles = Article::when(isset(request()->search),function ($query){
            $search = request()->search;
            return $query->orWhere("title","like","%$search%")->orWhere("description","like","%$search%");
        })->with('user','category')->latest('id')->paginate(10);
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
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
            'category' => "required|exists:categories,id",
            "title" => "required|min:5|max:200",
            "description" => "required|min:5",
            "photo.*" => "mimes:png,jpg,jpeg",
        ]);

        
        
        if($request->hasFile("photo")){
            $fileNameArr = [];
            foreach($request->file('photo') as $file){
                $newFileName = uniqid()."_profile.".$file->getClientOriginalExtension();
                array_push($fileNameArr,$newFileName);
                $dir = "/public/article";
                Storage::putFileAs($dir,$file,$newFileName);
            }
        }

        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title)."-".uniqid();
        $article->description = $request->description;
        $article->excerpt = Str::words($request->description,50);
        $article->user_id = Auth::id();
        $article->category_id = $request->category;
        $article->save();

        if($request->hasFile('photo')){
            foreach($fileNameArr as $file){
                $photo = new photo();
                $photo->article_id = $article->id;
                $photo->location = $file; 
                $photo->save();
            }
        }
        return redirect()->route('article.index')->with("status","Adding successfully");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("article.show",compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category' => "required|exists:categories,id",
            "title" => "required|min:5|max:200",
            "description" => "required|min:5",
            
        ]);
       
        if($article->title != $request->title) {
            $article->slug = Str::slug($request->title)."-".uniqid();
        }
        $article->title = $request->title;
        $article->description = $request->description;
        $article->excerpt = Str::words($request->description,50);
        $article->category_id = $request->category;
        $article->save();
        return redirect()->route('article.index')->with('updateSuccess','Article is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        
            if(isset($article->photo)){
                $dir ="/public/article/";
                foreach($article->photo as $p){
                    Storage::delete($dir.$p->location);
                }
                $toDel = $article->photo->pluck('id');
                photo::destroy($toDel);
    
            }
        $article->delete();
        return redirect()->route('article.index',['page'=>request()->page]);
    }
}
