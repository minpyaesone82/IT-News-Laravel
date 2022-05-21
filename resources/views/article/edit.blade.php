@extends('layouts.app')
@section('title') Article Edit @endsection
@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Edit</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="feather feather-plus-circle mr-2"></i>
                            Article Edit
                        </p>
                        <a href="{{route('article.index')}}" class="btn btn-primary"> <i class="feather feather-layers"></i> </a>
                    </div>
                    <form action=" {{route('article.update',$article->id)}} " id="editArticle" method="post">
                        @csrf
                        @method("put")
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Select Category</label>
                                <select name="category" class="custom-select" id="" form="editArticle">
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{old('category',$article->category_id) == $category->id ? 'selected':''}}>{{$category->title}}</option>
                                    @endforeach

                                </select>
                                @error('category')
                                    <small class="font-weight-bold text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="form-gorup">
                                    <label for="" class="mb-2">Article Title</label>
                                    <input type="text" name="title" class="form-control" form="editArticle" value="{{old('title',$article->title)}}">
                                    @error('title')
                                        <small class="font-weight-bold text-danger">{{$message}}</small>
                                    @enderror
                                </div>

        
                                <div class="form-gorup">
                                    <label for="" class="my-2">Article Description</label>
                                    <textarea type="text" name="description" rows="7" class="form-control" form="editArticle" value=""> {{old('description',$article->description)}} </textarea>
                                    @error('description')
                                        <small class="font-weight-bold text-danger">{{$message}}</small>
                                    @enderror
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <button class="w-100 btn btn-primary" form="editArticle" type="submit">Update Article</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection