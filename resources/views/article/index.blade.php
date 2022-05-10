@extends('layouts.app')
@section('title') Article List @endsection
@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('article.create')}}">Article Create</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card p-2 mb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="feather feather-plus-circle"></i>
                            Article List
                        </p>
                        <a href="{{route('article.create')}}" class="btn btn-primary"> <i class="feather feather-plus-square"></i> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <table class="table table-bordered table-hover  table-responsive-md table-responsive-lg">
                <thead>
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
                   @foreach ($articles as $article)
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
                                <a href="{{route('article.edit',$article->id)}}" class="btn btn-primary btn-sm"> <i class="feather feather-edit"></i> Edit</a>
                                <form action="{{route('article.destroy',$article->id)}}" method="post" class="d-inline-block" >
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
                   @endforeach 
                </tbody>
            </table>
            <div>
                {{$articles->links()}}
            </div>
        </div>
        
    </div>
@endsection