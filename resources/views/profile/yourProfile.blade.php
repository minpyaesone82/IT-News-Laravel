@extends('layouts.app')

@section('title')
    profile
@endsection
@section('content')

   <div class="container">
       <div class="col-12 col-md-5">
        <div class="card shadow-sm">
            <div class="card-body">
                 <img src="{{ asset('storage/profile/' . Auth::user()->photo )}}" class="rounded" style="height:20em;width:100%;" alt="">
                 <p class="text-center mt-2">Email : {{ Auth::user()->email }}</p> 
                 
                 <p class="text-center">name : {{ Auth::user()->name }}</p> 

            </div>
        </div>
       </div>
   </div>


    
@endsection