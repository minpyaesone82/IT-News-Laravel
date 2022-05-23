@extends('layouts.app')
@section('content')

    @auth
    <p > You are welcome </p>  
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
