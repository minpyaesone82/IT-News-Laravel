@extends('layouts.app')
@section('content')

    {{-- @guest
        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
    @else
        <header >welcome </header>

        {{ date('d M Y h:i A') }}
    @endguest --}}

    @auth
    <header >welcome </header>

    {{ date('d M Y h:i A') }} 
    @endauth

    
@endsection