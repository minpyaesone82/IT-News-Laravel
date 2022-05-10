@extends('layouts.app')

@section('title')

    ChangePassword
    
@endsection
@section('content')

    <div class="container">
        

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.changePass') }}">
                        @csrf 
  
                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right"> <i class="feather feather-lock mr-2 font-weight-bold font-weight-bold"></i> Current Password</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                @error('current_password')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right"><i class="feather feather-refresh-cw  mr-2 font-weight-bold"></i>New Password</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                @error('new_password')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right "><i class="feather feather-check mr-2 font-weight-bold"></i>New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                @error('new_confirm_password')
                                    <small class="text-danger font-weight-bold">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection