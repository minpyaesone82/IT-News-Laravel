@extends('layouts.app')
@section('title') {{$article->title}} @endsection

@section('head')
    <style>
        .description{
            white-space: pre-line;
        }

        /* .article-thumbnail{
            margin-top: 10px;
            width: 100%;
            height: auto;
            border-radius:0.25rem;
            background-size: cover;
            background-repeat: none;
        } */
    </style>
@endsection
@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Show</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="mt-2">{{$article->title}}</h4>
                    <div class="my-3">
                        @isset($article->photo)
                        @foreach ($article->photo as $img)
                        <img class="article-thumbnail" width="500" height="300" style="background-image: url('{{asset("storage/article/".$img->location)}}') ; width: 100%;
                        height: auto; border-radius:0.25rem;background-size: cover;background-repeat: none; ">
                        @endforeach
                    @endisset
                    </div>
                    <div class="date-category-owner">
                        <span class="mr-1">
                            <i class="feather feather-layers text-danger"></i>
                            <small> {{$article->category->title}}</small>
                        </span>
                        <span class="small mr-1">
                            <i class="feather feather-calendar text-success"></i> {{$article->created_at->format('d M Y')}}  
                        </span>
                        <span class="small">
                            <i class="feather feather-user text-info"></i> {{$article->user->name}}
                        </span>
                    </div>
                    <p class="mt-3 description"> {{$article->description}} </p>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{route('article.edit',$article->id)}}" class="btn btn-primary btn-sm">  Edit</a>
                            <form action="{{route('article.destroy',[$article->id,'page'=>request()->page])}}" method="post" class="d-inline-block" >
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure {{$article->title}} Delete ? ')"> Delete</button>
                            </form>
                        </div>
                        <div class="">
                            {{$article->created_at->diffForHumans()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection