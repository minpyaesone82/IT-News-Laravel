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
         
    <button class="btn btn-primary test-alert" >alert</button>
    <button class="btn btn-primary test-tost" >tost</button>

    @endauth

    
@endsection

@section('foot')
    <script>
        $('.test-alert').click(function(){
            Swal.fire({
            icon: 'success',
            title: 'Update Success',
            text: 'You just update Now!',
            })
        });

        $('.test-tost').click(function(){
            const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'You just update Now'
            })
        })
    </script>
    
@endsection
