@extends('layouts.app')
@section('content')

    @guest
        
        <div class="container">
            <div class="row vh-100 justify-content-center align-items-center">
                <div class="col-12 col-md-4">
                    <div class="card shadow-sm text-center my-5">
                        <div class="card-header">
                            Welcome Guest 
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    @else
        <header >welcome </header>
    @endguest
    
@endsection