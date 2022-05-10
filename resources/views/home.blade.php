@extends('layouts.app')
@section('content')

    @guest
        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
    @else
        <header >welcome </header>

        {{ date('d M Y h:i A') }}
        kasdhfasdfasdfbasd
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, minima ad est velit impedit debitis aliquam iusto ab eos beatae non recusandae in fugit tempora assumenda ratione minus repellat dolore!
    @endguest

    
@endsection