@extends('layouts.app')
@section('title')
    Update Photo
    
@endsection
@section('content')
<div class="container">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">Edit Profile</div>
            
            <div class="card-body">

                <img src="{{ asset("storage/profile/".Auth::user()->photo) }}" class="w-100" style="height:20em" alt="">

              <form action="{{route('profile.changePhoto')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Choose New Photo</label>
                    <input type="file" name="photo" class="form-control p-1" accept="image/jpg,image/png">
                    @error('photo')
                        <small class="font-weight-bold text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button class="btn btn-primary w-100" >Update Profile Photo</button>
            </form>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection