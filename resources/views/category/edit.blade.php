@extends('layouts.app')
@section('title') Category Manager @endsection
@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category Manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category Edit</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header">
                        <h5> <i class="feather feather-edit"></i> Category Edit</h5>
                    </div>
                    <hr>
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @method('put')
                        @csrf
                       <div class="form-inline">
                            <input type="text" name="title" class="form-control mr-2" placeholder="Title" value="{{old('title',$category->title)}}">
                            <button class="btn btn-primary" type="submit">Save</button> 
                        </div> 
                        @error('title')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                    </form>

                    @if(session('updateStatus'))
                        <p class="alert alert-success">{{session('updateStatus')}}</p>
                    @endif
                    <br>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection