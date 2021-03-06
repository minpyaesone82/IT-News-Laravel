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

    <div class="article-list">
        @forelse ($articles as $article)
            <div class="border-bottom mb-4 pb-4 article-preview">
                <div class="p-0 p-md-3">
                    <a class="fw-bold h4 d-block text-decoration-none" style="word-wrap:break-word"
                        href="{{route('detail',$article->slug)}}">
                        {{$article->title}}
                    </a>

                    @isset($article->photo)
                        @foreach ($article->photo as $img)
                        <img class="article-thumbnail" width="700" height="400" style="background-image: url('{{asset("storage/article/".$img->location)}}') ">
                        @endforeach
                    @endisset

                    <div class="small post-category mt-2">
                        <a href="{{route('baseOnCategory',$article->category->id)}}" rel="category tag">{{$article->category->title}}</a> 
                    </div>

                    <div class="text-black-50 the-excerpt mt-3 ">
                        <p style="word-break: break-all"> {{$article->excerpt}}</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center see-more-group">
                        <div class="d-flex align-items-center">
                            <img alt="" src="{{ asset('storage/profile/' .$article->user->photo ) }}"
                                    class="avatar avatar-50 photo rounded-circle" style="Height:40px;width:40px;"
                                    loading="lazy">
                            <div class="ms-2">
                                <span class="small">
                                    <i class="feather-user"></i>
                                    {{$article->user->name}}
                                </span>
                                <br>
                                <span class="small"> {{$article->created_at->format('d M Y')}}</span>
                            </div>
                        </div>

                        <a href="{{ route('detail',$article->slug) }}" class="btn btn-outline-primary rounded-pill px-3">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="mb-4 pb-4">
                <div class="py-5 my-5 text-center text-lg-start">
                    <p class="fw-bold text-primary">Dear Viewer</p>
                    <h1 class="fw-bold">
                        There is no article ???? ...
                    </h1>
                    <p>Please go back to Home Page</p>
                    <a class="btn btn-outline-primary rounded-pill px-3" href="{{route('index')}}">
                        <i class="feather-home"></i>
                        Blog Home
                    </a>

                </div>
            </div>
        @endforelse
    </div>
    <div class="d-block d-lg-none justify-content-center" id="pagination">
        {{$articles->onEachSide(1)->links()}}
    </div>
@endsection


@section('pagination')
    <div class="d-none d-lg-block justify-content-center">
        {{$articles->onEachSide(1)->links()}}
    </div>
@endsection