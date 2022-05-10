@extends('layouts.app')
@section('title')

    Update Name & Email
    
@endsection

@section('content')

    <div class="container">
        <div class="col-12 col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('profile.emailChange')}}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label"> <i class="feather feather-user"></i> Change Your name</label>
                            <div class="">
                                <input  type="text" class="form-control" name="name" value="{{old('name') ?? Auth::user()->name  }}">
                                @error('name')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                @enderror
                            </div>                            
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label"> <i class="feather feather-mail"></i> Change Your Email</label>
                            <div class="">
                                <input  type="text" class="form-control" name="email" value="{{old('email') ?? Auth::user()->email}}">
                                @error('email')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                @enderror
                            </div>                            
                          </div>
                          <button class="btn btn-primary" type="submit">Update</button>


                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection