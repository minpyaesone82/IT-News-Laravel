@extends('layouts.app')
@section('title') Category Manager @endsection
@section('head')
    <style>
        @media screen and (max-width:430px){
            .form-change{
                flex-flow: row !important;
                display: flex;
                align-items: center;
            }
            
        }
        @media screen and (min-width:450px){
            .form-change{
                display: flex;
                align-items: center;
            }
            form{
                width:40%;
            }
        }
    </style>  
@endsection
@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card"> 
                
                <div class="card-body">
                    <div class="header">
                        <p class="font-weight-bold"> <i class="feather feather-layers"></i> Category List</p>
                    </div>
                    <hr>
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                       <div class="form-change">
                            <input type="text" name="title" class="form-control mr-2 mt-2 @error('title') is-invalid @enderror" placeholder="Title" value="{{old('title')}}">
                            <button class="btn btn-primary mt-2" type="submit">Save</button> 
                        </div> 
                        @error('title')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                    </form>
                    <br>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection