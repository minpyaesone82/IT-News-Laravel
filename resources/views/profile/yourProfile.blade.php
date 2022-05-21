@extends('layouts.app')

@section('title')
    profile
@endsection
@section('content')

   <div class="container">
       <div class="col-12 col-md-5">
        <div class="card shadow-sm ">
            <div class="card-body">
                 <img src="{{ asset('storage/profile/' . Auth::user()->photo )}}" class="rounded" style="height:20em;width:100%;" alt="">
                
                  <div class="text-center">
                    <h3 class="fw-bolder mt-3">{{ Auth::user()->name }}</h3>
                    {{ Auth::user()->email }}
                  </div>
                  <hr>
                  <p>Phone   <span class="ml-4">{{Auth::user()->phone}}</span></p>
                  <hr>
                  <p>Address  <span class="ml-3">{{Auth::user()->address}}</span></p>

                  
                
            </div>
      </div>
       </div>
   </div>


    
@endsection