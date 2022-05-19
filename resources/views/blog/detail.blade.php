@extends('blog.master')
@section('head')
    <style>
        .article-thumbnail{
            margin-top: 10px;
            width: 100%;
            height: auto;
            border-radius:0.25rem;
            background-size: cover;
            background-repeat: none;
        }
    </style>
@endsection
@section('content')

    <div class="py-3">

        <div class="small post-category">
            <a href="{{route('baseOnCategory',$article->category->id)}}" rel="category tag">{{$article->category->title}}</a> 
        </div>

        <h4 class="fw-bolder mt-2" style="word-break: break-all" >{{$article->title}} </h4>

            @foreach ($article->photo as $img)
            <img class="article-thumbnail" width="700" height="400" style="background-image: url('{{asset("storage/article/".$img->location)}}') ">
            @endforeach
          


        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="d-flex align-items-center">
                <img alt="" src="{{ asset('storage/profile/' .$article->user->photo ) }}"
                     class="avatar avatar-50 photo rounded-circle" style="Height:40px;width:40px;"
                     loading="lazy">
                
                    <div class="ms-2">
                        <a href="{{route('baseOnUser',$article->user->id)}}" class="small text-primary" style="text-decoration: none" >
                            <i class="feather-user"></i>
                            {{$article->user->name}}
                        </a>
                    </div>
                    <br>
            </div>
            <div class="text-primary">
                <span class="small"> {{$article->created_at->format('d M Y')}}</span> /
                <span class="small"> {{$article->created_at->format('h:i a')}}</span>
            </div>
        </div>
        

        <p class="mt-3" style="word-break: break-all">{{$article->description}}</p>


        @php
            $previous = App\Article::where('id','<',$article->id)->latest('id')->first();
            $next = App\Article::where('id','>',$article->id)->first();

        @endphp

        <div class="nav d-flex justify-content-between p-3">
            <a href="{{isset($previous) ? route('detail',$previous->slug) : '#'}}"
               class="btn btn-outline-primary page-mover rounded-circle @empty($previous) disabled @endempty">
                <i class="feather-chevron-left"></i>
            </a>

            <a class="btn btn-outline-primary px-3 rounded-pill" href="{{route('index')}}">
                Read All
            </a>

            <a href="{{isset($next) ? route('detail',$next->slug) : '#'}}"
               class="btn btn-outline-primary page-mover rounded-circle @empty($next) disabled @endempty">
                <i class="feather-chevron-right"></i>
            </a>
        </div>
    </div>

    <div class="d-block d-lg-none d-flex justify-content-center">
    </div>
@endsection

