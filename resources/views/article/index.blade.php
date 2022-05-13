@extends('layouts.app')
@section('title') Article List @endsection
@section('head')
    <style>
        @media screen and (max-width:430px){
            .form-change{
                flex-flow: row !important;
                display: flex;
                align-items: center;
            }
            form{
                width:100%;
            }
        }
        @media screen and (min-width:450px){
            .form-change{
                display: flex;
                align-items: center;
            }
        }
    </style>  
@endsection
@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('article.create')}}">Article Create</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-breadcrumb>

    @if(session('updateSuccess'))
        <p class="alert alert-success">{{session('updateSuccess')}}</p>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-3"> 
                <div class="card-body">
                    <p class="mb-0 font-weight-bold">
                        <i class="feather-list"></i>
                        Article List
                    </p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-none d-md-block">
                            <a href="{{ route('article.create') }}" class="btn btn-lg btn-outline-primary mr-3 btn-sm ">
                                <i class="feather-plus-circle"></i>
                                Create Article
                            </a>
                            @isset(request()->search)
                                <span class="font-weight-bold">Search By : "{{ substr( request()->search,0,20)}}"</span>
                            @endisset
                        </div>
                        <form action="{{ route('article.index') }}" class="" method="get">
                            <div class="form-change">
                                <input type="text" name="search" placeholder="Search Article" value="{{ request()->search }}" class="form-control mr-2" required>
                                <button class="btn btn-primary">
                                    <i class="feather-search"></i>
                                </button>
                                <br>   
                            </div>
                        </form>
                    </div>
                    <div class="d-md-none d-sm-block mt-3 ml-1">
                        @isset(request()->search)
                            <span class="font-weight-bold">Search By : "{{ substr( request()->search,0,25)}}"</span>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th class="text-nowrap">Title</th>
                            <th class="text-nowrap">Category</th>
                            <th class="text-nowrap">Post Owner</th>
                            <th class="text-nowrap">Control</th>
                            <th class="text-nowrap">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse ($articles as $article)
                           <tr>
                               <td>{{$article->id}}</td>
                               <td class="text-nowrap">
                                   <span class="font-weight-bold">{{substr($article->title,0,20)}}</span>
                                   <br>
                                   <small>{{substr($article->description,0,40)}}....</small>
                                </td>
                               
                               <td class="text-nowrap">{{$article->category->title}}</td>
                               <td class="text-nowrap">{{$article->user->name}}</td>
                               <th class="text-nowrap">
                                    <a href="{{route('article.show',$article->id)}}" class="btn btn-success btn-sm">  Show</a>
                                    <a href="{{route('article.edit',$article->id)}}" class="btn btn-primary btn-sm">  Edit</a>
                                    <form action="{{route('article.destroy',[$article->id,'page'=>request()->page])}}" method="post" class="d-inline-block" >
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure {{$article->title}} Delete ? ')"> Delete</button>
                                    </form>
                                </th>
                               <td class="text-nowrap">
                                    <small><i class="feather feather-calendar"></i> {{$article->created_at->format('d M Y')}}</small>
                                    <br>
                                    <small><i class="feather feather-clock"></i> {{$article->created_at->format('h:i a')}}</small>
                                </td>
                           </tr>
                           @empty
                           <tr>
                               <td colspan="6" class="text-center">There is no Article</td>
                           </tr>
                       @endforelse 
                    </tbody>
                </table>
            </div>
            <div>
                {{$articles->appends(request()->all())->links()}}
            </div>
        </div>
        
    </div>
@endsection