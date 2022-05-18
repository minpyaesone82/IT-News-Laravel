<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::when(isset(request()->search),function ($query){
            $search = request()->search;
            return $query->orWhere("title","like","%$search%")->orWhere("description","like","%$search%");
        })->with('user','category')->latest('id')->paginate(10);
        return view('welcome',compact('articles'));
    }

    public function detail($slug)
    {
       
        $article = Article::where("slug",$slug)->first();
        if (empty($article)) {
            return abort(404);
        }
       return view('blog.detail',compact('article')); 
    }

    public function baseOnCategory($id)
    {
        $articles = Article::where("category_id",$id)->when(isset(request()->search),function ($query){
            $search = request()->search;
            return $query->orWhere("title","like","%$search%")->orWhere("description","like","%$search%");
        })->with('user','category')->latest('id')->paginate(10);
        return view('welcome',compact('articles'));
    }

    public function baseOnUser($id)
    {
        $articles = Article::when(isset(request()->search),function ($query){
            $search = request()->search;
            return $query->orWhere("title","like","%$search%")->orWhere("description","like","%$search%");
        })->where("category_id",$id)->with('user','category')->latest('id')->paginate(10);
        return view('welcome',compact('articles'));
    }
}
